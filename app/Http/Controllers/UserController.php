<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Attestation;
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
        $listAttestations = Attestation::paginate(5);
        return  view('template',['users'=>$listUsers,'attestations'=>$listAttestations]);
    }

    public function create()
    {
        //
        $users = new User();
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

        if($request->input('TYPEUSER') == "0"){
            $users->TYPEUSER = 'ADMIN';
            $users->is_admin = 0;
        }elseif($request->input('TYPEUSER') == "1"){
            $users->TYPEUSER = 'USER';
            $users->is_admin = 1;
        }
        
        $users->password = Hash::make($request->input('name'));
        $users->CIN = $request->input('CIN');
        $users->NOM = $request->input('name');
        $users->PRENOM = $request->input('prenom');


        $users->save();

        return redirect('users');
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
        $users->CIN = $request->input('CIN');
        $users->NOM = $request->input('name');
        $users->PRENOM = $request->input('prenom');
        // $users->NOM_PRENOM = $users->NOM .' '.$users->PRENOM;
        
        if($request->input('TYPEUSER') != $request->input('TYPEUSER2')){
            $users->TYPEUSER = $request->input('TYPEUSER2');
            if($request->input('TYPEUSER2') == '0'){
                $users->is_admin = 0;
                $users->TYPEUSER = 'ADMIN';
            }else{
                $users->is_admin = 1;
                $users->TYPEUSER = 'USER';
            }
        }elseif($request->input('TYPEUSER') == $request->input('TYPEUSER2')){
            $users->TYPEUSER = $request->input('TYPEUSER');
            if($request->input('TYPEUSER') == '0'){
                $users->is_admin = 0;
                $users->TYPEUSER = 'ADMIN';
            }else{
                $users->is_admin = 1;
                $users->TYPEUSER = 'USER';
            }
        }
        $users->save();
        
        return redirect('users');

    }

    public function destroy($id)
    {
            $users = User::find($id);
            $users->delete();
            return redirect('users');
        
    }

}
