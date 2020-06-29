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
                                <li class="breadcrumb-item active">Mes Reponses</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <section class="row" style="height: 100%;">
                <x-letter-menu></x-letter-menu>
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <div class="card bg-light" style="height: 100%;">
                        <div class="card-header mb-0">
                            <div class="card-title row">
                                <div class="col mb-md-0">
                                    <h4>MESSAGES REPONDUS <span class="fas fa-envelope-open-text"></span></h4>
                                </div>
                                <div class="col mb-md-0">
                                    <div class="float-right btn-toolbar mr-2">
                                        <a href="{{route('letters.export')}}" class="btn btn-sm btn-outline-secondary mr-2">
                                            Imprimer <span class="fas fa-print"></span>
                                        </a>
                                        <a href="" class="btn btn-sm btn-outline-secondary">
                                            Télécgarger <span class="fas fa-print"></span>
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
                                        <th>
                                            Nom et Prenoms
                                        </th>
                                        <th>
                                            Age
                                        </th>
                                        <th>
                                            Titre de la lettre
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($answers as $answer)
                                        <?php $letter = $answer->letter()->first() ?>
                                        <tr>
                                            <td>
                                                {{++$i}}
                                            </td>
                                            <td>
                                                {{$letter->person()->first()->lastname}} {{$letter->person()->first()->firstname}}
                                            </td>
                                            <td>
                                                {{$letter->person()->first()->age}}
                                            </td>
                                            <td>
                                                {{$letter->title}}
                                            </td>
                                            <td>
                                                <a href="{{route('answers.show', $answer)}}">
                                                   <span class="fas fa-eye"></span>
                                                </a>
                                                <a href="{{route('answers.create', $letter)}}">
                                                    <span class="fas fa-edit"></span>
                                                </a>
                                                <form action="{{route('answers.delete', $answer)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm">
                                                        <span class="fas fa-trash"></span>
                                                    </button>
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
