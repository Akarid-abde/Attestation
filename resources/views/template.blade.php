@extends('layouts.master')

@section('content')

            <section id="Formulaire" class="border rounded p-3">
                <h1 class="text-center"> Formulaire </h1>
                <a href="#" id="showFormulaire" class="d-flex justify-content-md-end">
                    <span class="badge badge-primary"><i class="fa fa-arrow-down"></i></span>
                </a>

                <form id="form" action="{{ url('users') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email Personnel</label>
                            <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email Personnel">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email Academic</label>
                            <input name="EMAIL_ACADEMIC" type="email" class="form-control" id="inputEmail4" placeholder="Email Academique">
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="inputNom">Nom</label>
                            <input name="nom" type="text" class="form-control" id="inputNOM">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputPrenom">Prenom</label>
                            <input name="prenom" type="text" class="form-control" id="inputPRENOM">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">CIN</label>
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
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="inputNom">Nom Prenom</label>
                            <input name="nom" type="text" class="form-control" id="inputNOM">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputPrenom">الاسم الكامل</label>
                            <input name="prenom" type="text" class="form-control" id="inputPRENOM">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputZip">Date Naissance</label>
                            <input name="DATE_DE_NAISSANCE" type="date" class="form-control" id="inputCIN">
                        </div>
                      
                        <div class="form-group col-md-4">
                            <label for="inputAnnee">Annee Naissance</label>
                            <input name="YEAR_NAISSANCE" type="number" min="1900" max="2099" step="1" value="2016" class="form-control" id="inputAnnee" />
                        </div>
                 
                    </div>

                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                    </div>

                    <!-- <div class="form-group">
                        <label for="inputAddress2">Address 2</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                    </div> -->

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">City</label>
                            <input type="text" class="form-control" id="inputCity">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">State</label>
                            <select id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">Zip</label>
                            <input type="text" class="form-control" id="inputZip">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Check me out
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Valider</button>
                </form>
            </section>

            <section class="mt-5 pt-3">
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
                                <th>id</th>
                                <th>name</th>
                                <th>city</th>
                                <th>phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td>1</td>
                            <td>taha</td>
                            <td>Fes</td>
                            <td>+212 0687851684</td>
                            <td><button class="btn btn-primary">Add</button>
                            <button class="btn btn-success">Edite</button>
                            <button class="btn btn-warning">Delete</button>
                        </td>
                        </tbody>
                </table>
            </section>

            

@endsection