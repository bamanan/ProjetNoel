@extends('layouts.admin')

@push('styles')
    <style>
        .box {
            width: 100%;
            padding: 40px;
            position: absolute;
            background: #191919;
            transition: 0.25s;
            margin-top: 10px;
            margin-bottom: 10px;
            border-radius: 50px;
        }

        .box .form-control {
            background: none;
            display: block;
            margin: 20px auto;
            text-align: center;
            border: 2px solid #3498db;
            padding: 10px 10px;
            width: 250px;
            height: 50px;
            outline: none;
            color: white;
            border-radius: 24px;
            transition: 0.25s
        }

        .box h1 {
            color: white;
            text-transform: uppercase;
            font-weight: 500
        }

        .box .form-control:focus {
            width: 300px;
            border-color: #2ecc71
        }

        .box button[type="submit"] {
            background: none;
            display: block;
            margin: 20px auto;
            text-align: center;
            border: 2px solid #2ecc71;
            padding: 14px 40px;
            outline: none;
            color: white;
            border-radius: 24px;
            transition: 0.25s;
            cursor: pointer
        }

        .box button[type="submit"]:hover {
            background: #2ecc71
        }


    </style>
@endpush
@section('content')
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-6">
                <div class="card">
                    <form class="box" method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
                        @csrf

                        <h1 class="card-header">{{ __('Enregistrement') }}</h1>
                        <p class="text-muted">Entrez les informations utilisateurs!</p>

                        <div class="form-group">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}" required autocomplete="email" autofocus
                                   placeholder="Nom et prénoms">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                             </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                   placeholder="Email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="current-password" placeholder="Mot de passe">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   name="password_confirmation" required autocomplete="current-password"
                                   placeholder="Confirmer mot de passe">
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select name="role" class="form-control">
                                <option value="Admin">Administrateur</option>
                                <option selected value="Agent">Agent</option>
                            </select>
                            @error('role')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="file" class="form-control" id="avatar" name="avatar">
                            @error('avatar')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Enregistrer') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
