@extends("admin.layout")
@section("content")
<div class="row">
    <div class="col-9">
        <div class="content-header">
            <h2 class="content-title">Modifier un nouveau Entree</h2>
           {{--   <div>
                <button class="btn btn-light rounded font-sm mr-5 text-body hover-up">Save to draft</button>
                <button class="btn btn-md rounded font-sm hover-up">Publich</button>
            </div>  --}}
        </div>
    </div>
    <div class="col-lg-6">
        {!! Form::model($entree, ['method'=>'PATCH','route'=>['entree.update', $entree->id]]) !!}
        @csrf
         <div class="card mb-4">
            <div class="card-body">
                <div class="mb-4">
                    <label for="Produit" class="form-label">Produit</label>
                        <select class="form-select" name="produit_id">
                            <option value=""> Slectionner </option>
                            @foreach ($produits as $produit)
                                <option value="{{ $produit->id }}" {{ $produit->id==$entree->produit_id ? 'selected' : '' }}> {{ $produit->nom }}  </option>
                            @endforeach
                        </select>
                </div>
                <div class="mb-4">
                    <label for="Fournisseur" class="form-label">Fournisseur</label>
                        <select class="form-select" name="fournisseur_id">
                            <option value=""> Slectionner </option>
                            @foreach ($fournisseurs as $fournisseur)
                                <option value="{{ $fournisseur->id }}"  {{ $fournisseur->id==$entree->fournisseur_id ? 'selected' : '' }}>{{ $fournisseur->proprietaire }} : {{ $fournisseur->nom }}  </option>
                            @endforeach
                        </select>
                </div>
                <div class="mb-4">
                    <label for="tel" class="form-label">Quantite</label>
                    <input type="number" placeholder="Saisir ici" value="{{ $entree->quantite }}" name="quantite" class="form-control" id="tel" required>
                </div>

            </div>
            <button type="submit" class="btn btn-light rounded font-sm mr-5 text-body hover-up">Enregistrer</button>
        </div> <!-- card end// -->
        {!! Form::close() !!}    </div>

</div>
@endsection
