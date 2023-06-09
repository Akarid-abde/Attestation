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
                            <label for="inputDOTI">TYPEUSER</label>
                            <input name="TYPEUSER" value="{{ $us->TYPEUSER }}" type="text" class="form-control" disabled="true">
                        </div>

                    </div>
                    <hr><br>


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputState">TypeUser</label>
                            <select name="TYPEUSER2" id="inputState" class="form-control">
                                <option selected>CHOOSE...</option>
                                <option value="0">ADMIN</option>
                                <option value="1">USER</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                       
                    </div>
                    
                    <button type="submit" class="btn">Modifier</button>
                </form>

           
            </section>

@endsection

