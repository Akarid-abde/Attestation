<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Attestation de Travail</title>
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/qrcode.js') }}"></script>

</head>
<style type="text/css">
    body{
        font-family: 'Baskerville Old Face';
    }

    .container {
        position: fixed;
        top: 2%;
        left: 14%;
        margin-top: -65px;
        margin-left: -100px;
    }

    .border{
        border:1px solid black;
    }
    
    #footer-content {
        height: 15px; 
        padding: 6px;
        margin-bottom:0px;
        font-size: 0.875em;
    }
    
    header {
        display: block; text-align: center; 
        position: running(header);
    }

</style>
<body>
    <div class="container">
    <header style="padding-top:-50px">
<table style="text-align:center">
        <thead>
            <tr>
            <td style="text-align:center;font-weight: normal;font-size: 14px;">
            <h3>UNIVERSITE ABDELMALEK ESSAADI
            </br> FACULTE DES SCIENCES
            </br>TETOUAN
            </h3>
            </td>
            <td style="text-align:center">
                <img src="<?php echo $logo ?>" width="150px" height="130px">
            </td>
            <td style="text-align:center">
                <img src="<?php echo $logo2 ?>" width="260px" height="130px">
            </td>
            </tr>
        </thead>
</table>
</header>

<hr>

<fieldset style="color: #000000;font-weight:bold;position:relative;border: thick double #000000;  margin-right: 50px;margin-left: 50px;">
<br>
<div class="head-title">
    <h1 style="font-family: 'Baskerville Old Face'; font-size: 25px;margin-top:30px;text-align:center;font-weight: normal;text-decoration: underline;">ATTESTATION  DE  TRAVAIL</h1>
</div>

<div class="add-detail">
        <h4 style="font-weight: normal;;font-size: 20px">  Le Doyen de la Faculté des Sciences de Tétouan,</h4>   
        <p style="font-weight: normal;">  Certifie que Mr/Mme     <strong style="font-size: 20px;font-weight: bold;margin:10px;">: {{ $data->NOM_PPRENOM }}</strong></p>
        <p style="font-weight: normal;">  DOTI    <strong style="font-size: 20px;font-weight: bold;margin:110px;">:  {{ $data->id }}</strong></p>
        <h4 style="font-weight: normal;font-size: 20px"> Exerce à la dite Faculté en qualité de: </h4> 

        <h3 style="text-align:center;font-size: 22px;">{{ $data->GRADE }}</h3> 
        
        <h4 style="font-weight: normal;font-size: 20px"> En fois de quoi, cette attestation lui est délivrée, sur sa demande, pour servir et valoir ce que de droit.</h4> 
        <h3 style="text-align:center;font-weight: bold;font-style: italic;font-size: 20px">  Fait à Tétouan , le {{date("d/m/Y")}} </h3>
        
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <div style="bottom: 8px;left: 89%;position: relative;">
            <img src="<?php echo $qrcode ?>" alt="<?php echo $qrcode ?>" width="50px" height="50px">
        </div>
</div>
</fieldset>



<footer id="footer" style="font-weight: 100;">
  <div id="footer-content" style="text-align:center;font-style: italic;">
  <br>
  <hr>
  Université Abdelmalek Essaâdi, Faculté des Sciences, B.P. 2121 – Tétouan – Maroc <br>
  Tel : (212) (0539) 97 24 23, Fax : (212) (0539) 99 45 00 – Site web : www.fst.ac.ma
  </div>
</footer>
    </div>

<script type="text/javascript">
   var qrcode = new QRCode(document.getElementById("qrcode"), {
	width : 16,
	height : 16
});

function makeCode () {		
	var elText = document.getElementById("text");
	
	if (!elText.value) {
		alert("Input a text");
		elText.focus();
		return;
	}
	qrcode.makeCode(elText.value);
}

makeCode();
$("#text").
	on("blur", function () {
		makeCode();
	}).
	on("keydown", function (e) {
		if (e.keyCode == 13) {
			makeCode();
		}
	});
</script>

</body>
</html>
