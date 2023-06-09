<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;
use Carbon\Carbon;
class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $listUsers = User::paginate(5);
        return  view('template',['users'=>$listUsers]);
    }

    // public function find(Request $request){

    //     if($request->ajax()){
    //         $query = $request->get('search');

    //         $data=User::where('id','like','%'. $query .'%')
    //         ->orwhere('CIN','like','%'.$query.'%')
    //         ->orwhere('N_POSTE','like','%'.$query.'%')->get();
    
    
    //         $output='';
    //     if(count($data)>0){
    
    //          $output ='
    //             <table class="table">
    //             <thead>
    //             <tr>
    //                 <th scope="col">#</th>
    //                 <th scope="col">Title</th>
    //                 <th scope="col">Description</th>
    //             </tr>
    //             </thead>
    //             <tbody>';
    
    //                 foreach($data as $row){
    //                     $output .='
    //                     <tr>
    //                     <th scope="row">'.$row->id.'</th>
    //                     <td>'.$row->CIN.'</td>
    //                     <td>'.$row->N_POSTE.'</td>
    //                     </tr>
    //                     ';
    //                 }
    
    //          $output .= '
    //              </tbody>
    //             </table>';
    //     }
    //     else{
    //         $output .='No results';
    //     }
    
    //     return $output;

    //     }
    // }
    
    public function create()
    {
        //
        return view('template');
    }

    public function store(Request $request)
    {
        
        $users = new User();
        $users->name = $request->input('name');

        if (empty($request->input('email'))){
            $users->email = $request->input('name')."@gmail.com";
        } else{
            $users->email = $request->input('email');
        }
        
        $users->password = Hash::make($request->input('name'));
        $users->is_admin = 0;
        $users->id = $request->input('DOTI');
        $users->N_POSTE = $request->input('N_POSTE');
        $users->CIN = $request->input('CIN');
        $users->EMAIL_ACADEMIC = $request->input('EMAIL_ACADEMIC');
        $users->NOM = $request->input('name');
        $users->PRENOM = $request->input('prenom');
        $users->NOM_PPRENOM = $request->input('NOM_PPRENOM');
        $users->NOM_PRENOM_AR = $request->input('NOM_PRENOM_AR');
        
        
        $users->DATE_DE_NAISSANCE = $request->input('DATE_DE_NAISSANCE');

        if (!empty($request->input('DATE_DE_NAISSANCE'))){
            $time = $request->input('DATE_DE_NAISSANCE');
            $users->YEAR_NAISSANCE = date('Y', strtotime($time));
            // $users->YEAR_NAISSANCE = $date->format('Y');
        }else{
            $users->YEAR_NAISSANCE = $request->input('YEAR_NAISSANCE');
        }
        
        // if(empty($request->input('DATE_DE_NAISSANCE'))){
        //    $dF = $date->format('Y')+"/31/12";
        //    $newDate = Carbon::createFromFormat('Y-m-d', $dF)
        //                      ->format('Y-m-d');
        //    $users->DATE_DE_NAISSANCE = $newDate;
        // }else{
        //     $users->DATE_DE_NAISSANCE = $request->input('DATE_DE_NAISSANCE');
        // }
        
        $users->DATE_DE_RECRUTEMENT = $request->input('DATE_DE_RECRUTEMENT');
        $users->GRADE = $request->input('GRADE');
        $users->GRADE_AR = $request->input('GRADE_AR');
        $users->DATE_EFFET_ECHELLE= $request->input('DATE_EFFET_ECHELLE');
        $users->ECHELLE = $request->input('ECHELLE');

        $users->DATE_EFFET_ECHELLE= $request->input('DATE_EFFET_ECHELLE');

        if ($request->input('GRADE') == "INGENIEUR DETAT GRADE PRINCIPALE") {
            $users->DATE_EXAMAN = date('Y/m/d', strtotime($users->DATE_EFFET_ECHELLE. '+ 4 years'));
        }else {
            $users->DATE_EXAMAN = date('Y/m/d', strtotime($users->DATE_EFFET_ECHELLE. '+ 6 years'));
        }

        $users->ECHELLON = $request->input('ECHELLON');
        $users->DATE_EFFECT_ECHELLON = $request->input('DATE_EFFECT_ECHELLON');
        $users->AFFECTATION = $request->input('AFFECTATION');
        $users->ADRESSE = $request->input('ADRESSE');
        $users->TELEPHONE = $request->input('TELEPHONE');
        $users->TELE_FAX = $request->input('TELE_FAX');
        $users->SEXE = $request->input('Sexe');
        $users->ACTIVE = $request->input('Active');

        // dd($users);
        $users->save();
        // return view('template');
    }

    
    public function show(Admin $admin)
    {
        
    }

    public function edit($id)
    {
        $users = User::find($id);
        return view('edit',['us' => $users]);
    }

    public function update(Request $request,$id)
    {
        $users = User::find($id);
        $users->name = $request->input('name');
        if (empty($request->input('email'))){
            $users->email = $request->input('name')+"@gmail.com";
        } else{
            $users->email = $request->input('email');
        }
        
        // $users->password = Hash::make($request->input('name'));
        $users->is_admin = 0;
        $users->id = $request->input('DOTI');
        $users->N_POSTE = $request->input('N_POSTE');
        $users->CIN = $request->input('CIN');
        $users->EMAIL_ACADEMIC = $request->input('EMAIL_ACADEMIC');
        $users->NOM = $request->input('name');
        $users->PRENOM = $request->input('prenom');
        $users->NOM_PPRENOM = $request->input('NOM_PPRENOM');
        $users->NOM_PRENOM_AR = $request->input('NOM_PRENOM_AR');
        
        
        $users->DATE_DE_NAISSANCE = $request->input('DATE_DE_NAISSANCE');

        if (!empty($request->input('DATE_DE_NAISSANCE'))){
            $time = $request->input('DATE_DE_NAISSANCE');
            $users->YEAR_NAISSANCE = date('Y', strtotime($time));
        }else{
            $users->YEAR_NAISSANCE = $request->input('YEAR_NAISSANCE');
        }

        $users->DATE_DE_RECRUTEMENT = $request->input('DATE_DE_RECRUTEMENT');
        $users->GRADE = $request->input('GRADE');
        $users->GRADE_AR = $request->input('GRADE_AR');

        $users->DATE_EFFET_ECHELLE= $request->input('DATE_EFFET_ECHELLE');

        if ($request->input('GRADE') == "INGENIEUR DETAT GRADE PRINCIPALE") {
            $users->DATE_EXAMAN = date('Y/m/d', strtotime($users->DATE_EFFET_ECHELLE. '+ 4 years'));
        }else {
            $users->DATE_EXAMAN = date('Y/m/d', strtotime($users->DATE_EFFET_ECHELLE. '+ 6 years'));
        }


        $users->ECHELLE = $request->input('ECHELLE');
        $users->ECHELLON = $request->input('ECHELLON');
        $users->DATE_EFFECT_ECHELLON = $request->input('DATE_EFFECT_ECHELLON');
        $users->AFFECTATION = $request->input('AFFECTATION');
        $users->ADRESSE = $request->input('ADRESSE');
        $users->TELEPHONE = $request->input('TELEPHONE');
        $users->TELE_FAX = $request->input('TELE_FAX');
        $users->SEXE = $request->input('Sexe');
        $users->ACTIVE = $request->input('Active');
        $users->save();
        return redirect('users');

    }

    public function destroy(Admin $admin)
    {
        
    }

}
