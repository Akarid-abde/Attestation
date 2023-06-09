@extends('layouts.master')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@section('content')

            <section id="Formulaire" class="border rounded p-3">
                <h1 class="text-center"> Tirer Attestation </h1>
                <a id="showFormulaire" class="d-flex justify-content-md-end">
                    <span class="badge badge-primary">
                        <i class="fa fa-arrow-down"></i>
                    </span>
                </a>
         
                <form id="form" action="{{ url('attestations') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputNom">Nom</label>
                            <input name="name" type="text" class="form-control" id="inputNOM" require="true">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputPrenom">Prenom</label>
                            <input name="prenom" type="text" class="form-control" id="inputPRENOM" require="true">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputCIN">CIN</label>
                            <input name="CIN" type="text" class="form-control" id="inputCIN">
                        </div>

                    </div>

                    <hr><br>

                    <div class="form-row">

                        <div class="form-group col-md-12">
                            <label for="inputGRADE">GRADE</label>
                            <input name="GRADE" type="text" class="form-control" id="inputNOM">
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputDATE_EFFET_ECHELLE">DATE DETBUT</label>
                            <input name="DATE_DEBUT" type="date" class="form-control" id="inputDATE_DE_RECRUTEMENT">
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label for="inputDATE_EFFET_ECHELLE">DATE FIN</label>
                            <input name="DATE_FIN" type="date" class="form-control" id="inputDATE_DE_RECRUTEMENT">
                        </div>
                        
                        <div class="form-group col-md-4 invisible">
                            <label for="inputPrenom">responsable</label>
                            <input name="responsable" value="{{Auth::user()->name}}" type="text" class="form-control"  id="inputResponsable" require="true">
                        </div>

                        <div class="form-group col-md-4 invisible">
                            <label for="inputPrenom">id responsable</label>
                            <input name="id_user" value="{{Auth::user()->id}}" type="text" class="form-control"  id="inputResponsable" require="true">
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Valider</button>
                </form>

            </section>

            

            @if (Route::has('register') and Auth::user()->TYPEUSER == 'ADMIN')
            
            <section id="Formulaire" class="border rounded p-3">
                <h1 class="text-center"> Ajouter User </h1>
                <a id="showFormulaire2" class="d-flex justify-content-md-end">
                    <span class="badge badge-primary">
                        <i class="fa fa-arrow-down"></i>
                    </span>
                </a>
         
                <form id="form2" action="{{ url('users') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputNom">Nom</label>
                            <input name="name" type="text" class="form-control" id="inputNOM" require="true">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputPrenom">Prenom</label>
                            <input name="prenom" type="text" class="form-control" id="inputPRENOM" require="true">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputCIN">CIN</label>
                            <input name="CIN" type="text" class="form-control" id="inputCIN">
                        </div>
                
                    </div>
                    <hr><br>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputState">TypeUser</label>
                            <select name="TYPEUSER" id="inputState" class="form-control">
                                <option selected>CHOOSE...</option>
                                <option value="0">ADMIN</option>
                                <option value="1">USER</option>
                            </select>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Valider</button>
                </form>

            </section>

            <section class="mt-5 pt-3">
            <h2 class="panel-heading">Liste des certificats retirés</h2>
                <!-- <div class="panel-heading">Search</div>
                <div class="panel-body ">
                    <input type="text" name="search" id="search" class="form-control"
                    placeholder="Search  Data" />
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2 p-2">    
                <div class="d-flex flex-row">
                        <span class="badge badge-primary text-center mr-2">
                        Export : 
                        </span>
                        <div class="mr-2">
                            <span class="badge badge-primary"><i class="fa fa-file-excel-o"></i>cvs</span>
                        </div>
                        <div class="mr-2">
                            <span class="badge badge-primary"><i class="fa fa-file-excel-o"></i>xls</span>
                        </div>
                    </div>
                </div> -->


                <table class="table table-striped">
                        <thead>
                            <tr class="table-active">
                                <th>ID</th>
                                <th>CIN</th>
                                <th>NOM Prenom</th>
                                <th>GRADE</th>
                                <th>Debut</th>
                                <th>Fin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($attestations as $attestation)
                            <tr>
                            <td>{{$attestation->id_attestation}}</td>
                            <td>{{$attestation->CIN}}</td>
                            <td>{{$attestation->NOM_PRENOM}}</td>
                            <td>{{$attestation->GRADE}}</td>
                            <td>{{$attestation->DATE_DEBUT}}</td>
                            <td>{{$attestation->DATE_FIN}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
                <div>
                {!! $attestations->links() !!}
                </div>
            </section>


            <section class="mt-5 pt-3">
            <h2 class="panel-heading">List Users</h2>
                <table class="table table-striped">
                        <thead>
                            <tr class="table-active">
                                <th>ID</th>
                                <th>CIN</th>
                                <th>NOM Prenom</th>
                                <th>GRADE</th>
                                <th>Debut</th>
                                <th>Fin</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->CIN}}</td>
                            <td>{{$user->TYPEUSER}}</td>
                            <td><button onclick='openForm()'  class="btn btn-success"><a href="{{ url('users/'.$user->id.'/edit')}}">Edite</a></button></td>
                            <form method="post" action="{{ url('users/'.$user->id.'/delete') }}" class="form-container">
                                @method('delete')
                                @csrf
                                <td>
                                <button class="btn btn-warning">DELETE</button>
                                </td>
                            </form>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
                <div>
                {!! $users->links() !!}
                </div>
                
            </section>
            @endif
@endsection

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
                 
                }
            })
        }

        $(document).on('keyup','#search',function(){
            var query = $(this).val();
            fetch_data(query);
        });
        
    });
</script>
