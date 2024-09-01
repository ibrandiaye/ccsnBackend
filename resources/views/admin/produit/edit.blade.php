@extends("admin.layout")
@section("content")
<div class="row">
    <div class="col-9">
        <div class="content-header">
            <h2 class="content-title">Modifier un nouveau Produit</h2>
           {{--   <div>
                <button class="btn btn-light rounded font-sm mr-5 text-body hover-up">Save to draft</button>
                <button class="btn btn-md rounded font-sm hover-up">Publich</button>
            </div>  --}}
        </div>
    </div>
    <div class="col-lg-6">
        {!! Form::model($produit, ['method'=>'PATCH','route'=>['produit.update', $produit->id],'enctype'=>'multipart/form-data']) !!}
        @csrf
         <div class="card mb-4">
            <div class="card-body">
                <div class="mb-4">
                    <label for="nom" class="form-label">Nom Produit</label>
                    <input type="text" placeholder="Saisir ici" value="{{ $produit->nom }}" name="nom" class="form-control" id="nom" required>
                </div>
                <div class="mb-4">
                    <label for="tel" class="form-label">Quantite</label>
                    <input type="number" placeholder="Saisir ici" value="{{ $produit->quantite }}" name="quantite" class="form-control" id="tel" required>
                </div>
                <div class="mb-4">
                    <label for="photo" class="form-label">image</label>
                    <input type="file" placeholder="Saisir ici" name="photo" class="form-control" id="photo" >
                </div>
                <div class="mb-4">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" placeholder="Saisir ici" name="description" value="{{ $produit->description }}" class="form-control" id="description" required>
                </div>
                <div class="mb-4">
                    <label for="categorie" class="form-label">Categorie</label>
                        <select class="form-select" name="categorie_id">
                            <option value=""> Slectionner </option>
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}" {{ $categorie->id==$produit->categorie_id ? 'selected' :'' }}> {{ $categorie->nom }}  </option>
                            @endforeach
                        </select>
                </div>
            </div>
            <button type="submit" class="btn btn-light rounded font-sm mr-5 text-body hover-up">Enregistrer</button>
        </div> <!-- card end// -->
        {!! Form::close() !!}    </div>

</div>
@endsection
