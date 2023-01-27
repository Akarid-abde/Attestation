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

    public function generatePDF()
    {
        $data =  User::find(1);
        // $data = ['title' => 'Welcome to ItSolutionStuff.com'];
        $pdf = PDF::loadView('myPDF', ['data' => $data]);
  
        return $pdf->download('Attestation.pdf');
        // return $pdf->stream('Attestation.pdf');
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
        
        $fonc_data = $this->get_fonctE_data($id);

        $output ='
        <!DOCTYPE html>
        <html>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Attestation de Travail</title>
        </head>
        <style type="text/css">
        .m-0{
            margin: 0px;
        }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width:50%;   
    }
    .w-85{
        width:85%;   
    }
    .w-15{
        width:15%;   
    }
    .logo img{
        width:45px;
        height:45px;
        padding-top:30px;
    }
    .logo span{
        margin-left:8px;
        top:19px;
        position: absolute;
        font-weight: bold;
        font-size:25px;
    }
    .gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr th{
        background: #F4F4F4;
        font-size:15px;
    }
    table tr td{
        font-size:13px;
    }
    table{
        border-collapse:collapse;
    }
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:20px;
    }
    td {
    border: 1px solid #000;
    }
</style>
<body>
<table align="center" style=" margin: 15px 0;" class="w-100">
        <thead>
            <tr>
            <td class="text-center m-0 p-0">
            <h3>UNIVERSITE ABDELMALEK ESSAADI <br>
            FACULTE DES SCIENCES 
            TETOUAN</h3>
            </td>
            <td class="text-center m-0 p-0">
            <img class="text-center m-0 p-0" src="public/img/logo.png" style="width:170px;height:150px"/>
            </td>
            <td class="text-center m-0 p-0">
            <h2 dir="rtl" lang="AR" style="font-family: DejaVu Sans, sans-serif;text-align: center;"> 
            <br>جامعة عبد المالك السعدي
            كلية العلوم
            <br>تطوان
            </h2>
            </td>
            </tr>
        </thead>
</table>

<fieldset>
    <div class="head-title">
    <h3 class="text-center m-0 p-0">ATTESTATION  DE  TRAVAIL</h3>
</div>

<div class="add-detail mt-10">
    

        <h4>  Le Doyen de la Faculté des Sciences de Tétouan,</h4>   
        
        <h4>  Certifie que Mr   :  '.$fonc_data->name.'</h4>
        <h4>  DOTI  : '.$fonc_data->id.' </h4> 
        <br>

        <h4> Exerce à la dite Faculté en qualité de: </h4> 

        <h3 align="center">'.$fonc_data->GRADE.'</h3> 
        
        <h4> En fois de quoi, cette attestation lui est délivrée, sur sa demande, pour servir et valoir ce que de droit.</h4> 
        <p align="center" style="{ font-weight: bold; }">  Fait à Tétouan , le {{date("d/m/Y")}} </p>
        
        <br>
</div>
</fieldset>

</body>
</html>
        ';



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
