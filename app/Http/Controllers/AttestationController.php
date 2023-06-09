<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Attestation;
use PDF;
use DB;
use QrCode;

class AttestationController extends Controller
{
    public function index()
    {
        $fonc_data = $this->get_fonct_data();
        return view('AttestationTravail/index')->with('fonc_data',$fonc_data);
    }

    public function Job()
    {
        $fonc_data = $this->get_fonct_data();
        return view('AttestationTravail/job')->with('fonc_data',$fonc_data);
    }

    public function generatePDF($id)
    {
        // $data =  User::find($id);
        $data = Attestation::where('id_attestation',$id)->first();
        $qrcodeval = 'Moon System-'.$data->id_attestation.' '.$data->NOM_PPRENOM.' '.$data->type_attestation.' '.$data->GRADE.'';
        $qrcode = base64_encode(QrCode::format('svg')->size(50)->errorCorrection('H')->generate($qrcodeval));
        

        $path = base_path('public/images/logo.png');
        $type = pathinfo($path,PATHINFO_EXTENSION);
        $da = file_get_contents($path);
        $logo = 'data:image/'.$type.';base64,'.base64_encode($da);

        // $path2 = base_path('public/images/faculte.PNG');
        // $type2 = pathinfo($path2,PATHINFO_EXTENSION);
        // $da2 = file_get_contents($path2);
        // $logo2 = 'data:image/'.$type2.';base64,'.base64_encode($da2);

        // $path3 = base_path('public/images/faculteF.PNG');
        // $type3 = pathinfo($path3,PATHINFO_EXTENSION);
        // $da3 = file_get_contents($path3);
        // $logo3 = 'data:image/'.$type3.';base64,'.base64_encode($da3);
        $page = '';
        $qr =  'data:image/'.$type.';base64,'.$qrcode;


        if($data->type_attestation == 'STAGE'){
            $page = 'myPDF';
        }elseif($data->type_attestation == 'TRAVAIL'){
            $page = 'AtTravail';
        }


        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, "isRemoteEnabled"=> true,"defaultPaperSize" => "a4"])->loadView($page, ['data' => $data,'logo' => $logo,
        'qrcode' => $qr]);
        return $pdf->stream('Attestation.pdf');
    }

    

    function get_fonct_data(){
        $fonc_data =  DB::table('attestations')->get();
        return   $fonc_data;
    }


    public function find(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('attestations')
                        ->where('type_attestation','STAGE')
                        ->where('CIN',$query)
                        ->Orwhere('responsable',$query)
                        ->get();
            }

            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
                    <tr>
                    <td>'.$row->id_attestation.'</td>
                    <td>'.$row->type_attestation.'</td> 
                    <td>'.$row->CIN.'</td> 
                    <td>'.$row->NOM_PRENOM.'</td> 
                    <td>'.$row->DATE_DEBUT.'</td>
                    <td>'.$row->DATE_FIN.'</td> 
                    <td>'.$row->created_at.'</td><td> 
                    <button class="btn btn-light"><a href="Atravail/pdf/'.$row->id_attestation.'"><i class="fa fa-print"></i></a>
                    </button>
                    </td></tr>';
                }
            }
            else
            {
                $output .= '
                <tr>
                <td colspan="5">I N\'exist pas </td>
                </tr>
                ';
            }
            $data = array(
                'table_data' => $output,
                'total_data' => $total_row  
            );
            echo json_encode($data);
        }
    }

    public function find2(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('attestations')
                        ->where('type_attestation','TRAVAIL')
                        ->where('responsable',$query)
                        ->Orwhere('CIN',$query)
                        ->get();
            }

            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
                    <tr>
                    <td>'.$row->id_attestation.'</td>
                    <td>'.$row->type_attestation.'</td> 
                    <td>'.$row->CIN.'</td> 
                    <td>'.$row->NOM_PRENOM.'</td> 
                    <td>'.$row->DATE_DEBUT.'</td>
                    <td>'.$row->DATE_FIN.'</td> 
                    <td>'.$row->created_at.'</td><td> 
                    <button class="btn btn-light"><a href="Atravail/pdf/'.$row->id_attestation.'"><i class="fa fa-print"></i></a>
                    </button>
                    </td></tr>';
                }
            }
            else
            {
                $output .= '
                <tr>
                <td colspan="5">I N\'exist pas </td>
                </tr>
                ';
            }
            $data = array(
                'table_data' => $output,
                'total_data' => $total_row  
            );
            echo json_encode($data);
        }
    }


    public function create()
    {
        $attestation = new Attestation();
        return view('template');
    }

    public function store(Request $request)
    {
        
        $attestation = new Attestation();

        $attestation->CIN = $request->input('CIN');
        $attestation->NOM = strtoupper($request->input('name'));
        $attestation->PRENOM = strtoupper($request->input('prenom'));
        $attestation->GRADE = $request->input('GRADE');
        $attestation->NOM_PRENOM = $attestation->NOM .' '.$attestation->PRENOM; 
        $attestation->DATE_DEBUT = $request->input('DATE_DEBUT');
        $attestation->DATE_FIN = $request->input('DATE_FIN');
        $attestation->type_attestation = 'STAGE';
        $attestation->responsable = $request->input('responsable');
        $attestation->id_users = $request->input('id_user');

        //dd($attestation);
        $attestation->save();
        // return view('template');
    }

    public function edit($id_attestation)
    {
        $attestation = Attestation::find($id_attestation);
        return view('edit',['us' => $attestation]);
    }

    public function update(Request $request,$id_attestation)
    {
        $attestation = Attestation::find($id_attestation);
        
        // $users->is_admin = 0;
        $attestation->CIN = $request->input('CIN');
        $attestation->NOM = $request->input('name');
        $attestation->PRENOM = $request->input('prenom');
        $attestation->NOM_PRENOM = $attestation->NOM .' '.$attestation->PRENOM;
        $attestation->DATE_FIN = $request->input('DATE_DEBUT');
        $attestation->DATE_FIN = $request->input('DATE_FIN');
        $attestation->GRADE = $request->input('GRADE');
        $attestation->type_attestation = 'STAGE';
        $attestation->save();
        return redirect('users');

    }

    public function destroy($id_attestation)
    {
            $attestation = Attestation::find($id_attestation);
            $attestation->delete();
            return redirect('users');
        
    }

}
