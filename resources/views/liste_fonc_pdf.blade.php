@extends('layouts.master')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h3 align="center">GENERER PDF</h3>
        <div class="row">
            <div class="col-md-7">
                <h4>ETUDIANT DATA</h4>
            </div>
            <div class="col-md-5">
                <a href="{{ url('/liste_fonc_pdf/pdf') }}" class="btn btn-primary">
                    <span>Fonctionnaires<i class="fa fa-file-pdf-o"></i></span>
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>ID</tr>
                </thead>
                <tbody>
                    @foreach($fonc_data as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>
                        <a href="{{ url('/liste_fonc_pdf/pdf/'.$data->id)}}" class="btn btn-primary">
                        <span><i class="fa fa-file-pdf-o"></i></span>
                        </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
@endsection