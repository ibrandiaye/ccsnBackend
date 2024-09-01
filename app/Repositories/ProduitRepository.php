<?php
namespace App\Repositories;

use App\Models\Produit;
use App\Repositories\RessourceRepository;
use Illuminate\Support\Facades\DB;

class ProduitRepository extends RessourceRepository{
    public function __construct(Produit $produit){
        $this->model = $produit;
    }
 public function updateQuantite($id,$quantite){
    return DB::table("produits")->where("id",$id)->update(["quantite"=>$quantite]);

 }
}
