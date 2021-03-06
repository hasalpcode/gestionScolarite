@extends('master')

@section('content')
    <div class="row col-lg-12">
        <div class="card align-content-lg-center shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Liste des Paiements</h6>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="dataTable_length">
                                <label>Show <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div id="dataTable_filter" class="dataTables_filter">
                                <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('paiement.create') }}" class="btn btn-success">Ajouter</a>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Mode Paiement</th>
                                <th>Mat etudiant</th>
                                <th>Montant</th>
                                <th>Date Paiement</th>
                                <th>Mois</th>
                                <th>Libelle</th>
                                <th>Observation</th>
                                <th style="width: 200px;">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Mode Paiement</th>
                                <th>Mat etudiant</th>
                                <th>Montant</th>
                                <th>Date Paiement</th>
                                <th>Mois</th>
                                <th>Libelle</th>
                                <th>Observation</th>
                                <th style="width: fit-content;">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($paiements as $paiement)

                            <tr>
                                <td> {{ $paiement->idpaiement }} </td>
                                <td> {{ $paiement->modePaiement->libellemodepaiement }} </td>
                                <td> {{ $paiement->etudiant->matricule }} </td>
                                <td> {{ $paiement->montant }} </td>
                                <td> {{ $paiement->datepaiement }} </td>
                                <td>
                                @foreach (json_decode($paiement->mois) as $moi)
                                    {{ $moi }}
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                                </td>
                                <td>{{ $paiement->libelle }}</td>
                                <td>{{ $paiement->observation }}</td>
                                <td >
                                    <a class="btn-primary" href="{{ route('paiement.edit', $paiement->idpaiement ) }}">Modifier</a>
                                    <a class="btn-success" href="{{ route('recu', $paiement->idpaiement)}}"> <i class="fas fa-print"></i> Imprimer</a> <br>
                                    <form action="{{ route('paiement.destroy', $paiement->idpaiement ) }}" method="post">
                                        @method('DELETE')
                                        @csrf <button onclick="return confirm('Voulez-vous vraiment supprimer')" type="submit" class="btn-danger">Supprimer</button>

                                    </form>
                                </td>

                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
