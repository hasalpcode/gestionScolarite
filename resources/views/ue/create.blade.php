@extends('master')

@section('content')
    <div class="align-content-md-center">

        <div class="card text-left">
            <div class="card-header">Formulaire d'ajout d'une Unite d'enseignement</div>
          <div class="card-body">
            <form method="POST" action="{{ route('ue.store')}}">
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif  }} --}}
                @csrf
                <div class="form-group">
                    <label for="filiere">Selectionner la filiere</label>
                    <select name="filiere" class="form-control @error('filiere') is-invalid @enderror" id="filiere">
                      @foreach ($specialites as $filiere)
                          <option value="{{ $filiere->idfiliere }}">{{ $filiere->nomfiliere }}</option>
                      @endforeach
                    </select>
                    @error('filiere')
                        <div class="alert alert-danger"> {{$message}} </div>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="descuea">Description UE</label>
                  <textarea name="descuea" class="form-control @error('descuea') is-invalid @enderror" id="descuea">Entrer la description</textarea>
                    @error('descuea')
                        <div class="alert alert-danger"> {{$message}} </div>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="typeuea">Type UE</label>
                  <input type="text" name="typeuea" class="form-control @error('typeuea') is-invalid @enderror" id="typeuea" placeholder="Entrer le type de l'ue">
                    @error('typeuea')
                        <div class="alert alert-danger"> {{$message}} </div>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="sigleuea">Sigle UE</label>
                  <input type="text" name="sigleuea" class="form-control @error('sigleuea') is-invalid @enderror" id="sigleuea" placeholder="Entrer le sigle de l'ue">
                    @error('sigleuea')
                        <div class="alert alert-danger"> {{$message}} </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Ajouter l'ue</button>
            </form>
          </div>
        </div>

    <div>
@endsection
