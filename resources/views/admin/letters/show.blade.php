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
                                <li class="breadcrumb-item active">Voir</li>
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
                                    <h4>Contenu <span class="fas fa-envelope-open-text"></span></h4>
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
                                <div class="col">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 col-sm-5 h5">Expéditeur:</div>
                                        <div class="col-lg-6 col-md-8 col-sm-7 text-muted">
                                            <p class="h6 mt-0 mb-0">{{$letter->person()->first()->firstname}} {{$letter->person()->first()->lastname}}</p>
                                            <p class="mt-0 mb-0">{{$letter->person()->first()->age}} ans</p>
                                            <p class="mt-0 mb-0">{{$letter->person()->first()->address()->first()->toString()}}</p>
                                            <p class="mt-0 mb-0">{{$letter->person()->first()->email}}</p>
                                            <hr style="border-top: 1px solid; margin-left:0" width="30%">
                                        </div>
                                        <div class="col-lg-3 text-center">
                                            <h6 class="text-muted">Date: {{$letter->created_at->format('d/m/Y H:m:s')}}</h6>
                                        </div>
                                    </div>
                                    <h5>Objet: {{$letter->title}}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col text-justify">
                                {!! $letter->content !!}
                            </div>
                            <div class="col d-flex">
                                <img src="{{$letter->getFirstMediaUrl('images')}}" alt="" width="100%">
                                {{$letter->getFirstMediaUrl('images')}}
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>



@endsection
