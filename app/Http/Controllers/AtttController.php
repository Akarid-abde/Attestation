<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PayUService\Exception;
use App\User;
use PDF;
use DB;

class AtttController extends Controller
{
    public function index()
    {
        $fonc_data = $this->get_fonct_data();
        return view('AttestationTravail/index')->with('fonc_data',$fonc_data);
    }

    public function generatePDF($id)
    {
        $data =  User::find($id);
        
        $path = base_path('public/images/logo.png');
        $type = pathinfo($path,PATHINFO_EXTENSION);
        $da = file_get_contents($path);
        $logo = 'data:image/'.$type.';base64,'.base64_encode($da);

        $path2 = base_path('public/images/faculte.PNG');
        $type2 = pathinfo($path2,PATHINFO_EXTENSION);
        $da2 = file_get_contents($path2);
        $logo2 = 'data:image/'.$type2.';base64,'.base64_encode($da2);

        $path3 = base_path('public/images/faculteF.PNG');
        $type3 = pathinfo($path3,PATHINFO_EXTENSION);
        $da3 = file_get_contents($path3);
        $logo3 = 'data:image/'.$type3.';base64,'.base64_encode($da3);

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, "isRemoteEnabled"=> true,"defaultPaperSize" => "a4"])->loadView('myPDF', ['data' => $data,'logo' => $logo,'logo2' => $logo2
        ,'logo3' => $logo3]);
        // return $pdf->download('Attestation.pdf');

        return $pdf->stream('Attestation.pdf');
    }

    public function generatePdfTest()
    {
        $data =  User::find(1);
        
        $path = base_path('public/images/logo.png');
        $type = pathinfo($path,PATHINFO_EXTENSION);
        $da = file_get_contents($path);
        $logo = 'data:image/'.$type.';base64,'.base64_encode($da);

        $path2 = base_path('public/images/faculte.PNG');
        $type2 = pathinfo($path2,PATHINFO_EXTENSION);
        $da2 = file_get_contents($path2);
        $logo2 = 'data:image/'.$type2.';base64,'.base64_encode($da2);

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, "isRemoteEnabled"=> true])->loadView('myPDF', ['data' => $data,'logo' => $logo,'logo2' => $logo2]);
        // return $pdf->download('Attestation.pdf');
        return $pdf->stream('Attestation.pdf');
    }

    public function fr()
    {
       return view('testTpdf');
    }

    function get_fonct_data(){
        $fonc_data =  DB::table('users')->get();
        return   $fonc_data;
    }

    function get_fonctE_data($id){
        $fonc_data =  User::find($id);
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
                $data = DB::table('users')
                        ->where('id',$query)
                        ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
                    <tr>
                    <td>'.$row->id.'</td><td> 
                    <td>'.$row->N_POSTE.'</td><td> 
                    <td>'.$row->NOM_PPRENOM.'</td><td> 
                    <td>'.$row->GRADE.'</td><td> 
                    <button class="btn btn-light"><a href="Atravail/pdf/'.$row->id.'"><i class="fa fa-print"></i></a>
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
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fonctionnaire  $fonctionnaire
     * @return \Illuminate\Http\Response
     */
    public function show(Fonctionnaire $fonctionnaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fonctionnaire  $fonctionnaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Fonctionnaire $fonctionnaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fonctionnaire  $fonctionnaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fonctionnaire $fonctionnaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fonctionnaire  $fonctionnaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fonctionnaire $fonctionnaire)
    {
        //
    }

}
