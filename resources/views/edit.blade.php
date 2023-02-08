@extends('layouts.master')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@section('content')

            <section id="Formulaire" class="border rounded p-3">
                <h1 class="text-center"> Modifier </h1>
                <a href="#" id="showFormulaire" class="d-flex justify-content-md-end">
                    <span class="badge badge-primary">
                        <i class="fa fa-arrow-down"></i>
                    </span>
                </a>

                <form method="post" action="{{ url('users/'.$us->id) }}" class="form-container">
                    
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="inputNom">Nom</label>
                            <input name="name" value="{{ $us->NOM }}" type="text" class="form-control" id="inputNOM" require="true">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="inputPrenom">Prenom</label>
                            <input name="prenom" value="{{ $us->PRENOM }}" type="text" class="form-control" id="inputPRENOM" require="true">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="inputCIN">CIN</label>
                            <input name="CIN" value="{{ $us->CIN }}"  type="text" class="form-control" id="inputCIN">
                        </div>
                 
                        <div class="form-group col-md-2">
                            <label for="inputDOTI">DOTI</label>
                            <input name="DOTI" value="{{ $us->id }}" type="text" class="form-control" id="inputDOTI">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="inputDOTI">N_POSTE</label>
                            <input name="N_POSTE" value="{{ $us->N_POSTE }}"  type="text" class="form-control" id="inputN_POSTE">
                        </div>
                        
                        <div class="form-group col-md-2">
                            <label for="inputState">Sexe</label>
                            <select name="Sexe" id="inputState" class="form-control">
                                <option selected>{{ $us->SEXE }}</option>
                                <option>Choose...</option>
                                <option value="H">H</option>
                                <option value="F">F</option>
                            </select>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="inputNOM_PPRENOM">NOM PRENOM</label>
                            <input name="NOM_PPRENOM"  value="{{ $us->NOM_PPRENOM }}" type="text" class="form-control" id="inputNOM_PPRENOM">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputNOM_PRENOM_AR">الاسم الكامل</label>
                            <input name="NOM_PRENOM_AR"  value="{{ $us->NOM_PRENOM_AR }}" type="text" class="form-control" id="inputNOM_PRENOM_AR">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputDateNaissance">Date Naissance</label>
                            <input type="text" name="DATE_DE_NAISSANCE" value="{{ $us->DATE_DE_NAISSANCE ? $us->DATE_DE_NAISSANCE : 'NULL' }}" class="form-control" id="dateN">
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Just
                            </label>
                        </div>
        
                        <div class="form-group col-md-2">
                            <label for="inputAnneeNaissance">ANNEE NAISSANCE</label>
                            <input name="YEAR_NAISSANCE" value="{{ $us->YEAR_NAISSANCE ? $us->YEAR_NAISSANCE : 'NULL' }}" type="text" min="1900" max="2099" step="1" value="2016" class="form-control" id="inputAnnee" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputTELEPHONE">TELEPHONE</label>
                            <input name="TELEPHONE" value="{{ $us->TELEPHONE }}" type="text"  placeholder="+2126 XX XX XX XX" class="form-control" id="inputTELEPHONE">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputTELE_FAX">TELE_FAX</label>
                            <input name="TELE_FAX" value="{{ $us->TELE_FAX }}" type="text" placeholder="+2125 XX XX XX XX"  class="form-control" id="inputTELE_FAX">
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
                            <input name="email" value="{{ $us->email }}"  type="email" class="form-control" id="inputEmailPersonnel" placeholder="Example@gmail.com">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmailAcademic">Email Academic</label>
                            <input name="EMAIL_ACADEMIC" value="{{ $us->EMAIL_ACADEMIC }}" type="email" class="form-control" id="inputEmailAcademic" placeholder="Example@uae.ac.ma">
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputDATE_DE_RECRUTEMENT">DATE DE RECRUTEMENT</label>
                            <input name="DATE_DE_RECRUTEMENT" value="{{ $us->DATE_DE_RECRUTEMENT ? $us->DATE_DE_RECRUTEMENT : 'NULL' }}" type="text" class="form-control" id="inputDATE_DE_RECRUTEMENT">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputGRADE">GRADE</label>
                            <input name="GRADE" value="{{ $us->GRADE }}" type="text" class="form-control" id="inputNOM">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputGRADE_AR">GRADE_AR</label>
                            <input name="GRADE_AR" value="{{ $us->GRADE_AR }}" type="text" class="form-control" id="inputNOM">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputGRADE_AR">AFFECTATION</label>
                            <input name="AFFECTATION"  value="{{ $us->AFFECTATION }}" type="text" class="form-control" id="inputNOM">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputDATE_EFFET_ECHELLE">DATE EFFET ECHELLE</label>
                            <input name="DATE_EFFET_ECHELLE"  value="{{ $us->DATE_EFFET_ECHELLE ? $us->DATE_EFFET_ECHELLE : 'NULL' }}" type="text" class="form-control" id="inputDATE_DE_RECRUTEMENT">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="inputECHELLE">ECHELLE</label>
                            <input name="ECHELLE"  value="{{ $us->ECHELLE }}"  type="text" class="form-control" id="inputECHELLE">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="inputNom">ECHELLON</label>
                            <input name="ECHELLON" value="{{ $us->ECHELLON }}" type="text" class="form-control" id="inputNOM">
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label for="inputDATE_EFFET_ECHELLE">DATE EFFET ECHELLE</label>
                            <input name="DATE_EFFECT_ECHELLON" value="{{ $us->DATE_EFFECT_ECHELLON ? $us->DATE_EFFECT_ECHELLON : 'NULL' }}" type="text" class="form-control" id="inputDATE_DE_RECRUTEMENT">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputAddress">ADRESSE</label>
                        <textarea rows="3" cols="3"  name="ADRESSE" type="text" class="form-control" id="inputAddress" placeholder="ADRESSE">{{$us->ADRESSE}}</textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputState">Active</label>
                            <select name="Active" id="inputState" class="form-control">
                                <option selected>{{ $us->ACTIVE }}</option>
                                <option value="ACTIVE">ACTIVE</option>
                                <option value="Desactive">DESACTIVE</option>
                            </select>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn">Modifier</button>
                    <!-- <button type="button" class="btn cancel" onclick="closeForm()">Close</button> -->
                </form>

           
            </section>

@endsection

