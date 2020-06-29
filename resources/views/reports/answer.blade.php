<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>

    <style>
        .bg-img-overlay {
            background-image: linear-gradient(rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.3)) url({{$answer->getFirstMediaUrl('images')}});
            background-repeat: no-repeat;
            background-position: center;
            background-size: 300px 300px;
            min-height: 300px;
        }
    </style>
</head>
<body>

<?php $letter = $answer->letter()->first() ?>
<div class="container" style="height: 100%; width: 100%;">
    <div class="col-lg-9 col-md-9 col-sm-12">
        <div class="card bg-light" style="height: 100%">
            <div class="card-body">
                <div class="mt-3">
                    <div class="form-group">
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
