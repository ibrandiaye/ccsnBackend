@extends("admin.layout")
@section("content")
<div class="row">
    <div class="col-9">
        <div class="content-header">
            <h2 class="content-title">Ajouter un nouveau Fournisseur</h2>
           {{--   <div>
                <button class="btn btn-light rounded font-sm mr-5 text-body hover-up">Save to draft</button>
                <button class="btn btn-md rounded font-sm hover-up">Publich</button>
            </div>  --}}
        </div>
    </div>
    <div class="col-lg-6">
        <form action="{{ route('fournisseur.store') }}" method="POST">
            @csrf
        <div class="card mb-4">
            <div class="card-body">
                <div class="mb-4">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" placeholder="Saisir ici" name="nom" class="form-control" id="nom" required>
                </div>
                <div class="mb-4">
                    <label for="tel" class="form-label">Tel</label>
                    <input type="text" placeholder="Saisir ici" name="tel" class="form-control" id="tel" required>
                </div>
                <div class="mb-4">
                    <label for="adresse" class="form-label">Adresse</label>
                    <input type="text" placeholder="Saisir ici" name="adresse" class="form-control" id="adresse" required>
                </div>
                <div class="mb-4">
                    <label for="proprietaire" class="form-label">Proprietaire</label>
                    <input type="text" placeholder="Saisir ici" name="proprietaire" class="form-control" id="proprietaire" required>
                </div>
            </div>
            <button type="submit" class="btn btn-light rounded font-sm mr-5 text-body hover-up">Enregistrer</button>
        </div> <!-- card end// -->
    </form>
    </div>

</div>
@endsection
