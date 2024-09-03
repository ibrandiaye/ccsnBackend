@extends('layouts.app')

@section('content')
    <h1>Liste des Commandes</h1>
    <a href="{{ route('commandes.create') }}" class="btn btn-primary">Ajouter une commande</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Street</th>
                <th>City</th>
                <th>Region</th>
                <th>Country</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commandes as $commande)
                <tr>
                    <td>{{ $commande->name }}</td>
                    <td>{{ $commande->phone }}</td>
                    <td>{{ $commande->street }}</td>
                    <td>{{ $commande->city }}</td>
                    <td>{{ $commande->region }}</td>
                    <td>{{ $commande->country }}</td>
                    <td>
                        <a href="{{ route('commandes.edit', $commande->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('commandes.destroy', $commande->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
