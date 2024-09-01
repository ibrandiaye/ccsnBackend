@extends("admin.layout")

@section("content")
<div class="row">
    <div class="col-12">
        <div class="content-header">
            <h2 class="content-title">Ajouter un nouveau Catégorie</h2>
           {{--   <div>
                <button class="btn btn-light rounded font-sm mr-5 text-body hover-up">Save to draft</button>
                <button class="btn btn-md rounded font-sm hover-up">Publich</button>
            </div>  --}}
        </div>
    </div>
    <div class="card mb-4">
        <header class="card-header">
        </header>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-responsive-md table-striped text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom Catégorie</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($categories as $categorie)
                    <tr>
                        <td>{{ $categorie->id }}</td>
                        <td>{{ $categorie->nom }}</td>
                        <td>

                            <a href="{{ route('categorie.edit', $categorie->id) }}" class="btn btn-sm font-sm rounded btn-brand">
                                <i class="material-icons md-edit"></i> Edit
                            </a>
                            {!! Form::open(['method' => 'DELETE', 'route'=>['categorie.destroy', $categorie->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
                            <button class="btn btn-sm font-sm btn-light rounded">
                                <i class="material-icons md-delete_forever"></i> Delete
                            </button>
                            {!! Form::close() !!}



                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
