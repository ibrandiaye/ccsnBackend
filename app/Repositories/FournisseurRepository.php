<?php
namespace App\Repositories;

use App\Models\Fournisseur;
use App\Repositories\RessourceRepository;
use Illuminate\Support\Facades\DB;

class FournisseurRepository extends RessourceRepository{
    public function __construct(Fournisseur $fournisseur){
        $this->model = $fournisseur;
    }

}
