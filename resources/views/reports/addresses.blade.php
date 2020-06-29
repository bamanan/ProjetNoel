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


        <table border="1" style="border-collapse: collapse; width: 100%;">
            <tbody>
            @foreach($addresses as $address)
            <tr>
                <td style="width: 100%;">{{$address->toString()}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>

</div>

</body>
</html>
