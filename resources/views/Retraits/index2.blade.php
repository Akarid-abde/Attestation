@extends('layouts.master')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@section('content')

            <section id="Formulaire" class="border rounded p-3">
                <h1 class="text-center"> Retraits </h1>
                <a href="#" id="showFormulaire" class="d-flex justify-content-md-end">
                    <span class="badge badge-primary">
                        <i class="fa fa-arrow-down"></i>
                    </span>
                </a>

                <form id="form" action="{{ url('retraits') }}" method="post">
                    {{ csrf_field() }}

                        <div class="form-group col-md-2">
                            <label for="inputDOTI">DOTI</label>
                            <input name="DOTI" type="text" class="form-control" id="inputDOTI">
                        </div>
                    </div>

                    
                </form>
            </section>

            <section class="border rounded p-3">
                  <div class="panel-heading">Search</div>
                <div class="panel-body ">
                    <div class="form-group col-md-2">
                        <input type="text" name="doti" id="doti" class="form-control"
                        placeholder="Search  Data" />
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2 p-2">    
                <div class="d-flex flex-row">
                        <span class="badge badge-primary text-center mr-2">
                        Export : 
                        </span>
                        <div class="mr-2">
                            <!-- <a href="#"><span class="fa fa-file-excel-o"></span>cvs</a> -->
                            <span class="badge badge-primary"><i class="fa fa-file-excel-o"></i>cvs</span>
                        </div>
                        <div class="mr-2">
                            <span class="badge badge-primary"><i class="fa fa-file-excel-o"></i>xls</span>
                        </div>
                    </div>
                </div>
                 <div class="listdata" id="listdata">
                    <table class="table table-striped">
                        <thead>
                            <tr class="table-active">
                                <th>id</th>
                                <th>DOTI</th>
                                <th>DATE RETRAIT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($retraits as $retrait)
                            <tr>
                                <td>{{$retrait->id}}</td>
                                <td>{{$retrait->DOTI}}</td>
                                <td>{{$retrait->DateRetraits}}</td>
                            </tr>
                            @endforeach
                    
                        </tbody>
                    </table>
                {!! $retraits->links() !!}
                 </div>
            </section>
            
@endsection

<script>
    $(document).ready(function(){
        fetch_data();

        function fetch_data(query = '')
        {
            $.ajax({
                url:"{{ route('find1.action1') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data)
                {
                    $('#listdata').html(data.table_data);
                }
            })
        }

        $(document).on('keyup','#doti',function(){
            var query = $(this).val();
            fetch_data(query);
        });
        
    });
</script>
