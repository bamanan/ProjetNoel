@extends('layouts.admin')

@section('content')
    <div class="container text-center">
        <h1 class="mt-5">Bienvenue sur APE Noel</h1>
    </div>
    <div class="container-fluid d-flex justify-content-center">
        <ul class="nav flex-column text-center" style="margin-top: 15%">
            <li class="nav-item bg-light mb-3">
                <a class="nav-link" href="{{route('letters.index')}}">Lettres</a>
            </li>
            <li class="nav-item bg-light mb-3">
                <a class="nav-link" href="{{route('answers.index')}}">Reponses</a>
            </li>
            <li class="nav-item bg-light mb-3">
                <a class="nav-link" href="{{route('users.index')}}">Utilisateurs</a>
            </li>
        </ul>
    </div>
@endsection
