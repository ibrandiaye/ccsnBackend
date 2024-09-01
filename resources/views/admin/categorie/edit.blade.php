@extends("admin.layout")
@section("content")
<div class="row">
    <div class="col-9">
        <div class="content-header">
            <h2 class="content-title">Modifier un nouveau Catégorie</h2>
           {{--   <div>
                <button class="btn btn-light rounded font-sm mr-5 text-body hover-up">Save to draft</button>
                <button class="btn btn-md rounded font-sm hover-up">Publich</button>
            </div>  --}}
        </div>
    </div>
    <div class="col-lg-6">
        {!! Form::model($categorie, ['method'=>'PATCH','route'=>['categorie.update', $categorie->id]]) !!}
        @csrf        <div class="card mb-4">
            <div class="card-body">
                <div class="mb-4">
                    <label for="product_title" class="form-label">Product title</label>
                    <input type="text" name="nom" value="{{ $categorie->nom }}" placeholder="Type here" class="form-control" id="product_title">
                </div>
            </div>
            <button type="submit" class="btn btn-light rounded font-sm mr-5 text-body hover-up">Enregistrer</button>
        </div> <!-- card end// -->
        {!! Form::close() !!}    </div>

</div>
@endsection
