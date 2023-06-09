@extends('layouts.master')

@section('content')

<div class="container">
            <h3>Attestation de TRAVAIL</h3>
            <div class="panel panel-default">
                <div class="panel-heading">Search</div>
                <div class="panel-body">
                    <input type="text" name="search" id="search" class="form-control"
                    placeholder="Search by - employee - type d'attestation " />
                </div>
                <div class="table-responsive">
                    <h3 align="center">Total Data : <span id="total_records"></span></h3>
                    <table class="table table-striped table-bordeed">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Type_Attestation</th>
                                <th>CIN</th>
                                <th>NOM</th>
                                <th>DEBUT</th>
                                <th>FIN</th>
                                <th>Date de Creation</th>
                                <th><i class="fa fa-print"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
</div>
    
<script>
    $(document).ready(function(){
        fetch_data();
        function fetch_data(query = '')
        {
            $.ajax({
                url:"{{ route('find2.action2') }}",
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