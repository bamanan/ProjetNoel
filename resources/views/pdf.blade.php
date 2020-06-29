<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>

    <!-- Fonts -->
    <link href="//fonts.gstatic.com" rel="dns-prefetch">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Charmonman' rel='stylesheet'>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Charmonman';
            font-size: 22px;
        }

        .bg-img-overlay {
            background-image: linear-gradient(rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.3)), url({{$answer->getFirstMediaUrl('images')}});
            background-repeat: no-repeat;
            background-position: center;
            background-size: 300px 300px;
            min-height: 300px;
        }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center">
    <div class="col-lg-9 col-md-9 col-sm-12">
        <div class="card bg-light" style="height: 100%">
            <div class="card-header">
                <div class="card-title row">
                    <div class="col mb-2 mb-md-0">
                        <h4>Lire réponse <span class="fas fa-envelope-open-text"></span></h4>
                    </div>
                    <div class="col mb-2 mb-md-0">
                        <div class="float-right btn-toolbar mr-2">
                            <a href="{{route('letters.download', $letter)}}"
                               class="btn btn-sm btn-outline-secondary mr-2">
                                Imprimer <span class="fas fa-print"></span>
                            </a>
                            <a href="{{route('answers.edit', $answer)}}" class="btn btn-sm btn-outline-secondary">
                                Modifier <span class="fas fa-edit"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <hr class="text-muted" style="border-top: 1px solid">
                <div class="card-subtitle mb-1 row">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-5 h5">Expéditeur:</div>
                            <div class="col-lg-6 col-md-7 col-sm-7 text-muted">
                                <p class="h6 mt-0 mb-0">{{$letter->person()->first()->firstname}} {{$letter->person()->first()->lastname}}</p>
                                <p class="mt-0 mb-0">{{$letter->person()->first()->age}} ans</p>
                                <p class="mt-0 mb-0">{{$letter->person()->first()->address()->first()->toString()}}</p>
                                <p class="mt-0 mb-0">{{$letter->person()->first()->email}}</p>
                                <hr style="border-top: 1px solid; margin-left:0" width="30%">
                            </div>
                            <div class="col-lg-3 text-center">
                                <h6 class="text-muted">
                                    Date: {{$letter->created_at->format('d/m/Y H:m:s')}}</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5>Objet: {{$letter->title}}</h5>
                            </div>
                            <div class="col text-right">
                                <button type="button" class="btn btn-sm bg-transparent"
                                        data-toggle="collapse"
                                        data-target="#letter-collapse" aria-expanded="false"
                                        aria-controls="#letter-collapse">
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
                    <div class="form-group">
                        <div class="text-center">
                            <label class="h2 text-muted" for="answer">Votre réponse <span
                                    class="fas fa-caret-down"></span></label>
                        </div>
                        <div class="card d-flex align-items-center" style="">
                            <div class="bg-img-overlay">
                                <div class="card-text text-justify">
                                    {!! $answer->content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
