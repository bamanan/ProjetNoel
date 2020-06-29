@extends("layouts.admin")

@section("content")
    <div class="container" style="height: 100%;">
        <div class="card bg-transparent border-0" style="height: 100%">
            <div class="card-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>UTILISATEURS</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item">Utilisateurs</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <section class="row" style="height: 100%;">
                <div class="container-fluid">
                    <div class="card bg-light" style="height: 100%;">
                        <div class="card-header mb-0">
                            <div class="card-title row">
                                <div class="col mb-md-0">
                                    <h4>Listes des Utilisateurs<span class="fas fa-envelope-open-text"></span></h4>
                                </div>
                                <div class="col mb-md-0">
                                    <div class="float-right btn-toolbar mr-2">
                                        <a href="{{route('users.create')}}" class="btn btn-sm btn-outline-secondary mr-2">
                                            Nouvel Utilisateur <span class="fas fa-print"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body mt-0">
                            <div class="table-responsive">
                                <table class="table table-info table-hover">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                                {{++$i}}
                                            </td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>Role</td>
                                            <td>

                                                <form action="{{route('users.delete', $user)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a type="submit" href="{{route('users.delete', $user)}}" class="btn btn-sm">
                                                        <span class="fas fa-trash"></span>
                                                    </a>
                                                </form>
                                            </td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
