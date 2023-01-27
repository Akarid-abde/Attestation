@extends('layouts.master')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@section('content')

            <section id="Formulaire" class="border rounded p-3">
                <h1 class="text-center"> Formulaire </h1>
                <a href="#" id="showFormulaire" class="d-flex justify-content-md-end">
                    <span class="badge badge-primary">
                        <i class="fa fa-arrow-down"></i>
                    </span>
                </a>

                <form id="form" action="{{ url('users') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="inputNom">Nom</label>
                            <input name="name" type="text" class="form-control" id="inputNOM" require="true">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="inputPrenom">Prenom</label>
                            <input name="prenom" type="text" class="form-control" id="inputPRENOM" require="true">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="inputCIN">CIN</label>
                            <input name="CIN" type="text" class="form-control" id="inputCIN">
                        </div>
                 
                        <div class="form-group col-md-2">
                            <label for="inputDOTI">DOTI</label>
                            <input name="DOTI" type="text" class="form-control" id="inputDOTI">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="inputDOTI">N_POSTE</label>
                            <input name="N_POSTE" type="text" class="form-control" id="inputN_POSTE">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputState">Sexe</label>
                            <select name="Sexe" id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <option value="H">H</option>
                                <option value="F">F</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="inputNOM_PPRENOM">NOM PRENOM</label>
                            <input name="NOM_PPRENOM" type="text" class="form-control" id="inputNOM_PPRENOM">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputNOM_PRENOM_AR">الاسم الكامل</label>
                            <input name="NOM_PRENOM_AR" type="text" class="form-control" id="inputNOM_PRENOM_AR">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputDateNaissance">Date Naissance</label>
                            <input name="DATE_DE_NAISSANCE" type="date" class="form-control" id="dateN">
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Just
                            </label>
                        </div>
        
                        <div class="form-group col-md-2">
                            <label for="inputAnneeNaissance">ANNEE NAISSANCE</label>
                            <input name="YEAR_NAISSANCE" type="number" min="1900" max="2099" step="1" value="2016" class="form-control" id="inputAnnee" />
                        </div>
                    </div>

                   <!-- Telephones -->
                    <div class="form-row">
                    <div class="form-group col-md-4">
                            <label for="inputTELEPHONE">TELEPHONE</label>
                            <input name="TELEPHONE" type="text"  placeholder="+2126 XX XX XX XX" class="form-control" id="inputTELEPHONE">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputTELE_FAX">TELE_FAX</label>
                            <input name="TELE_FAX" type="text" placeholder="+2125 XX XX XX XX"  class="form-control" id="inputTELE_FAX">
                        </div>
                        <div class="form-group col-md-4" hidden="true">
                        <label for="inputPassword4">Password</label>
                        <input name="password" type="password" class="form-control" id="inputPassword4" placeholder="Password">
                        </div>
                    </div>

                    <hr><br>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmailPersonnel">Email Personnel</label>
                            <input name="email" type="email" class="form-control" id="inputEmailPersonnel" placeholder="Example@gmail.com">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmailAcademic">Email Academic</label>
                            <input name="EMAIL_ACADEMIC" type="email" class="form-control" id="inputEmailAcademic" placeholder="Example@uae.ac.ma">
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputDATE_DE_RECRUTEMENT">DATE DE RECRUTEMENT</label>
                            <input name="DATE_DE_RECRUTEMENT" type="date" class="form-control" id="inputDATE_DE_RECRUTEMENT">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputGRADE">GRADE</label>
                            <input name="GRADE" type="text" class="form-control" id="inputNOM">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputGRADE_AR">GRADE_AR</label>
                            <input name="GRADE_AR" type="text" class="form-control" id="inputNOM">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputGRADE_AR">AFFECTATION</label>
                            <input name="AFFECTATION" type="text" class="form-control" id="inputNOM">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputDATE_EFFET_ECHELLE">DATE EFFET ECHELLE</label>
                            <input name="DATE_EFFET_ECHELLE" type="date" class="form-control" id="inputDATE_DE_RECRUTEMENT">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="inputECHELLE">ECHELLE</label>
                            <input name="ECHELLE" type="text" class="form-control" id="inputECHELLE">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="inputNom">ECHELLON</label>
                            <input name="ECHELLON" type="text" class="form-control" id="inputNOM">
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label for="inputDATE_EFFET_ECHELLE">DATE EFFET ECHELLE</label>
                            <input name="DATE_EFFECT_ECHELLON" type="date" class="form-control" id="inputDATE_DE_RECRUTEMENT">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputAddress">ADRESSE</label>
                        <textarea rows="3" cols="3"  name="ADRESSE" type="text" class="form-control" id="inputAddress" placeholder="ADRESSE"></textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputState">Active</label>
                            <select name="Active" id="inputState" class="form-control">
                                <option selected>CHOOSE...</option>
                                <option value="Active">ACTIVE</option>
                                <option value="Desactive">DESACTIVE</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Valider</button>
                </form>

            </section>

            <section class="mt-5 pt-3">
                  <div class="panel-heading">Search</div>
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
                            <!-- <a href="#"><span class="fa fa-file-excel-o"></span>cvs</a> -->
                            <span class="badge badge-primary"><i class="fa fa-file-excel-o"></i>cvs</span>
                        </div>
                        <div class="mr-2">
                            <span class="badge badge-primary"><i class="fa fa-file-excel-o"></i>xls</span>
                        </div>
                    </div>
                </div>
                 <table class="table table-striped">
                        <thead>
                            <tr class="table-active">
                                <th>DOTI</th>
                                <th>NPOST</th>
                                <th>CIN</th>
                                <th>NOM Prenom</th>
                                <th>GRADE</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($users as $user)
                            <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->N_POSTE}}</td>
                            <td>{{$user->CIN}}</td>
                            <td>{{$user->NOM_PPRENOM}}</td>
                            <td>{{$user->GRADE}}</td>
                            <td><button class="btn btn-success">Edite</button></td>
                            <td><button class="btn btn-warning">Delete</button></td>
                            </tr>
                            @endforeach
                    
                        </tbody>
                </table>
                {!! $users->links() !!}

            </section>

            <div id="search_list"></div>
@endsection

<script>
            $(document).ready(function(){
             $('#search').on('keyup',function(){
                 var query= $(this).val();
                 $.ajax({
                    url:"{{ url('template') }}",
                    type:"GET",
                    data:{'search':query},
                    success:function(data){
                        $('#search_list').html(data);
                    }
             });
             //end of ajax call
            });
            });
</script>