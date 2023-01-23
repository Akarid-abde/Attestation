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
                    <button class="btn btn-light"><a href="Atravail/pdf/'.$row->id.'">Attestation Travail</a>
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
    


    function pdf(){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_fonct_data_to_html());
        $pdf->getDomPDF()->set_option('enable_php',true);
        $pdf->setPaper('a4','landscape');
        return $pdf->stream();
    }


    function pdfE($id){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_fonctE_data_to_html($id));
        $pdf->getDomPDF()->set_option('enable_php',true);
        $pdf->setPaper('a4','landscape');
        return $pdf->stream();
    }

    function convert_fonct_data_to_html(){
        $fonc_data = $this->get_fonct_data();
        $output ='
        <h3>Listes Fonctionnaires</h3>
        <table width="100%" style="border-collapse">
        <tr>
            <th>Doti</th>
            <th>Nom</th>
        </tr>
        ';
        foreach($fonc_data as $data)
        {
        $output .= '
            <tr>
                <td>'.$data->id.'</td>
                <td>'.$data->name.'</td>
            </tr>
        ';
        }
        $output .='
        <script type="text/php">
        if(isset($pdf)){
        $text = "Page : {PAGE_NUM}/{PAGE_COUNT}";
        $size = 10;
        $font = $fontMetrics->getFont("Verdana");
        $width = $fontMetrics->get_text_width($text,$font,$size) /2;
        $x= ($pdf->get_width() - $width) /2;
        $y= $pdf->get_height() - 35;
        $pdf->page_text($x,$y,$text,$font,$size);
    }
    </script>
        ';
    return $output;
    }

    function convert_fonctE_data_to_html($id){
        try {
            // Validate the value...
        $fonc_data = $this->get_fonctE_data($id);

        $output ='
        <html>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Attestation de travail '.$fonc_data->id.'</title>
        </head>
        <body>

        <table class="table table-striped table-bordered">
        <thead>
            <tr>
            <th>
            <h3>UNIVERSITE ABDELMALEK ESSAADI
            FACULTE DES SCIENCES
            TETOUAN</h3>
            </th>
            <th>
            <img src=""/>

            </th>
            <th>
            <h2 dir="rtl" lang="AR" style="font-family: DejaVu Sans, sans-serif;"> 
            جامعة عبد المالك السعدي
            كلية العلوم
            تطوان
            </h2>
            </th>
            </tr>
        </thead>
        </table>

        
        <hr>
        <br>

        <h3 align="center">ATTESTATION  DE  TRAVAIL</h3>
        <br>

        <h4>  Le Doyen de la Faculté des Sciences de Tétouan,</h4>   
        

        <h4>  Certifie que Mr   :  '.$fonc_data->name. '</h4>
        <h4>  DOTI  : '.$fonc_data->id.'  </h4> 
        <br>

        <h4> Exerce à la dite Faculté en qualité de: </h4> 

        <h2 align="center">'.$fonc_data->GRADE.'</h2> 
        <br>
        <h4> En fois de quoi, cette attestation lui est délivrée, sur sa demande, pour servir et valoir ce que de droit.</h4> 
        <p align="center" style="{ font-weight: bold; }">  Fait à Tétouan , le '.date("d/m/Y").'.</p>
        
        <br>
        <hr>
       
        ';
        
        
        $output .='
        <script type="text/php">
        if(isset($pdf)){
        $text = "Page : {PAGE_NUM}/{PAGE_COUNT}";
        $size = 10;
        $font = $fontMetrics->getFont("Verdana");
        $width = $fontMetrics->get_text_width($text,$font,$size)/2;
        $x= ($pdf->get_width() - $width) /2;
        $y= $pdf->get_height() - 35;
        $pdf->page_text($x,$y,$text,$font,$size);
    }
    </script>
        ';
    
        $output .='
        <script type="text/javascript">
            document.getElementById("p1").innerHTML = "New text!";
        </script>
    ';

        $output .='
        </body>
        </html>
        ';

        }  catch(\Exception $error){
            // return "Not exist";
            return view('AttestationTravail/index');
        }
        
    return $output;
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
