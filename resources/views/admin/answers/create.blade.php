@extends("layouts.admin")

@section("content")
    <div class="container" style="height: 100%;">
        <div class="card bg-transparent border-0" style="height: 100%">
            <div class="card-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Lettres</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item">Lettres</li>
                                <li class="breadcrumb-item">{{$letter->id}}</li>
                                <li class="breadcrumb-item active">Repondre</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <section class="row" style="height: 100%;">
                <x-letter-menu></x-letter-menu>
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <div class="card bg-light" style="height: 100%">
                        <div class="card-header">
                            <div class="card-title row">
                                <div class="col mb-2 mb-md-0">
                                    <h4>Ecrire réponse <span class="fas fa-envelope-open-text"></span></h4>
                                </div>
                                <div class="col mb-2 mb-md-0">
                                    <div class="float-right btn-toolbar mr-2">
                                        <a href="{{route('letters.download', $letter)}}"
                                           class="btn btn-sm btn-outline-secondary mr-2">
                                            Imprimer <span class="fas fa-print"></span>
                                        </a>
                                        <a href="{{route('letters.export')}}" class="btn btn-sm btn-outline-secondary">
                                            Télécgarger <span class="fas fa-print"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <hr class="text-muted" style="border-top: 1px solid">
                            <div class="card-subtitle mb-1 row">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 col-sm-5 h5">Expéditeur:</div>
                                        <div class="col-lg-7 col-md-8 col-sm-7 text-muted">
                                            <p class="h6 mt-0 mb-0">{{$letter->person()->first()->firstname}} {{$letter->person()->first()->lastname}}</p>
                                            <p class="mt-0 mb-0">{{$letter->person()->first()->age}} ans</p>
                                            <p class="mt-0 mb-0">{{$letter->person()->first()->address()->first()->toString()}}</p>
                                            <p class="mt-0 mb-0">{{$letter->person()->first()->email}}</p>
                                            <hr style="border-top: 1px solid; margin-left:0" width="30%">
                                        </div>
                                        <div class="col">
                                            <h6 class="text-muted">Date: 27/06/2020</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                       <div class="col">
                                           <h5>Objet: {{$letter->title}}</h5>
                                       </div>
                                        <div class="col text-right">
                                            <button type="button" class="btn btn-sm bg-transparent" data-toggle="collapse"
                                                    data-target="#letter-collapse" aria-expanded="false" aria-controls="#letter-collapse">
                                                <span class="fas fa-caret-down"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                           <div class="collapse" id="letter-collapse">
                               <div class="text-justify">
                                   {!! $letter->content !!}
                               </div>
                               <div class="d-flex">
                                   <img src="{{$letter->getFirstMediaUrl('images')}}" alt="" width="100%">
                                   {{$letter->getFirstMediaUrl('images')}}
                               </div>
                           </div>

                            <div class="mt-3">
                                <form action="{{route('answers.store', $letter)}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <div class="text-center">
                                            <label class="h2 text-muted" for="answer">Veuillez écrire votre ici <span class="fas fa-caret-down"></span></label>
                                        </div>

                                            <input class="form-control" name="title" id="title" placeholder="Titre" value="{{old('title')}}">
                                        <textarea class="form-control text-justify" name="content" id="answer" cols="30" rows="40">{{old('content')}}</textarea>
                                    </div>
                                    <div class="form-group custom-file mb-3 text-center">
                                        <input type="file" class="custom-file-input" id="bg_image" name="answer[image]" value="{{old('answer.image')}}">
                                        <label class="custom-file-label" for="bg_image">Choisir une image d'arrière plan</label>
                                        <label class="muted text-danger">JPG, JPEG, PNG</label>
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary"><span class="fas fa-send"></span>Envoyer</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @endsection


@push('scripts')
    <script async>
        (function () {
            $('textarea').summernote();
            @if($errors->any())
                Swal.fire(" @foreach($errors->all() as $error)\n" +
                "                                          \n" +
                "                                             {{$error}}\n" +
                "                                       \n" +
                "                                        @endforeach");
            @endif
            @if (Session::has('success'))
                Swal.fire('Succès', 'Reponse enregistrée avec succès !', 'success');
            @endif
        })()
    </script>
@endpush
