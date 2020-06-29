<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>

    <style>

    </style>
</head>
<body>
    <div class="card bg-light" style="height: 100%">
        <div class="card-header">
            <div class="card-title mb-1 row">
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

                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="collapse">
                <div class="text-justify">
                    {!! $letter->content !!}
                </div>
                <div class="d-flex">
                    <img src="{{$letter->getFirstMediaUrl('images')}}" alt="" width="100%">
                    {{$letter->getFirstMediaUrl('images')}}
                </div>
            </div>
        </div>
    </div>

</body>
</html>
