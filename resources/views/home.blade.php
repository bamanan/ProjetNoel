@extends('layouts.app')
@section('content')
       <div class="modal fade" id="letterModal" tabindex="-1" role="dialog" aria-labelledby="Modal de la lettre"
         aria-hidden="true" style="width: 100%" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Lettre</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route("letter.store")}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="modal-body">
                        <h3>
                            Tes Informations Personnelles :
                        </h3>
                        <div class="form-group mb-3">
                            <div class="form-row mt-2">
                                <div class="col">
                                    <input class="form-control" id="person.firstname"
                                           name="person[firstname]"
                                           placeholder="Prenoms" type="text"
                                           value="{{old('person.firstname')}}">

                                </div>
                                <div class="col">
                                    <input class="form-control" id="lastname" name="person[lastname]"
                                           placeholder="Nom" type="text" value="{{old('person.lastname')}}">

                                </div>
                            </div>
                            <div class="form-row mt-2">
                                <div class="col-3">
                                    <input class="form-control" id="age" name="person[age]"
                                           placeholder="Age"
                                           type="text" value="{{old('person.age')}}">

                                </div>
                                <div class="col">
                                    <input class="form-control" id="email" name="person[email]"
                                           placeholder="Email"
                                           type="email" value="{{old('person.email')}}">

                                </div>
                            </div>
                        </div>
                        <hr>
                        <h3>
                            Ton Adresse :
                        </h3>
                        <div class="form-group mb-3">
                            <div class="form-row mt-2">
                                <div class="col-5">
                                    <input class="form-control " id="city" name="address[city]"
                                           placeholder="Ville"
                                           type="text" value="{{old('address.city')}}">

                                </div>
                                <div class="col-4">
                                    <input class="form-control" id="street" name="address[street]"
                                           placeholder="Rue"
                                           type="text" value="{{old('address.street')}}">

                                </div>
                                <div class="col-3">
                                    <input class="form-control" id="postal_code" name="address[postal_code]"
                                           placeholder="Code Postal" type="text"
                                           value="{{old('address.postal_code')}}">

                                </div>
                            </div>
                        </div>
                        <hr>
                        <h3>
                            Ta Lettre :
                        </h3>
                        <div class="form-group mb-3">
                            <input class="form-control mt-2" id="title" name="letter[title]"
                                   placeholder="Objet"
                                   type="text" value="{{old('letter.title')}}">
                            <textarea class="form-control mt-2 summernote" id="content"
                                      name="letter[content]"
                                      placeholder="Contenu"
                                      rows="10">
                                            {{old('letter.content')}}
                                        </textarea>
                        </div>
                        <div class="custom-file mb-3 text-center">
                            <input type="file" class="custom-file-input" id="customFile"
                                   name="letter[image]">
                            <label class="custom-file-label" for="customFile">Choisir une pièce
                                jointe</label>
                            <label for="customFile" class="muted text-danger">JPG, JPEG, PNG</label>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-block">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script async>
        @if($errors->any())
            Swal.fire('Erreur', 'Erreur, veuillez correctement remplir le formulaire', 'error');
        @endif
        @if (Session::has('success'))
        Swal.fire('Succès', 'Ta lettre a été envoyée avec succès !', 'success');
        @endif
    </script>
@endsection
