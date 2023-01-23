@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attestation de Travail</title>
</head>
<body>
<br />
        <div class="container">
            <h3>Attestation de travail</h3>
            <div class="panel panel-default">
                <div class="panel-heading">Search</div>
                <div class="panel-body">
                    <input type="text" name="search" id="search" class="form-control"
                    placeholder="Doti" />
                </div>
                <div class="table-responsive">
                    <h3 align="center">Total Data : <span id="total_records"></span></h3>
                    <table class="table table-striped table-bordeed">
                        <thead>
                            <tr>
                                <th>DOTI</th>
                                <th>Print</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
<!-- <section class="border rounded p-3">
                <h1 class="text-center"> Attestation Travail </h1>
                <a href="#" id="showFormulaire" class="d-flex justify-content-md-end">
                    <span class="badge badge-primary">
                        <i class="fa fa-arrow-down"></i>
                    </span>
                </a>

                <form id="form" action="{{ url('find') }}" method="post">
                    {{ csrf_field() }}

                    
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputNom">DOTI</label>
                            <input name="id" type="text" class="form-control" id="inputNOM" placeholder="DOTI">
                        </div>
                        
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
</section>


<div class="container">
                <h3 align="center">GENERER PDF</h3>
                <div class="row">
                    <div class="col-md-7">
                        <h4>FONCTIONNAIRE DATA</h4>
                    </div>
                    <div class="col-md-5">
                        <a href="{{ url('/Atravail/pdf') }}" class="btn btn-primary">
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
                        <a href="{{ url('/Atravail/pdf/'.$data->id)}}" class="btn btn-primary">
                        <span><i class="fa fa-file-pdf-o"></i></span>
                        </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div> -->

</body>
</html>

<script>
    $(document).ready(function(){
        fetch_data();
        function fetch_data(query = '')
        {
            $.ajax({
                url:"{{ route('find.action') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data)
                {
                    $('tbody').html(data.table_data);
                    $('#total_records').text(data.total_data);
                }
            })
        }

        $(document).on('keyup','#search',function(){
            var query = $(this).val();
            fetch_data(query);
        });
        
    });
</script>
@endsection