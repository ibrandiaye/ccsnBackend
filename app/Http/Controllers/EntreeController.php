<?php

namespace App\Http\Controllers;

use App\Repositories\EntreeRepository;
use App\Repositories\FournisseurRepository;
use App\Repositories\ProduitRepository;
use Illuminate\Http\Request;

class EntreeController extends Controller
{
    protected $entreeRepository;
    protected $produitRepository;
    protected $fournisseurRepository;

    public function __construct(EntreeRepository $entreeRepository, ProduitRepository $produitRepository,
    FournisseurRepository $fournisseurRepository){
        $this->entreeRepository =$entreeRepository;
        $this->produitRepository = $produitRepository;
        $this->fournisseurRepository = $fournisseurRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entrees = $this->entreeRepository->getAll();
        return view('admin.entree.index',compact('entrees'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $produits = $this->produitRepository->getAll();
        $fournisseurs = $this->fournisseurRepository->getAll();
        return view('admin.entree.add',compact('produits','fournisseurs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entrees = $this->entreeRepository->store($request->all());
        $produit =$this->produitRepository->getById($request->produit_id);
        $produit->quantite = $produit->quantite+$request->quantite;
        $this->produitRepository->updateQuantite($produit->id,$produit->quantite);
        return redirect('admin/entree');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entree = $this->entreeRepository->getById($id);
        return view('admin.entree.show',compact('entree'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produits = $this->produitRepository->getAll();
        $entree = $this->entreeRepository->getById($id);
        $fournisseurs = $this->fournisseurRepository->getAll();
        return view('admin.entree.edit',compact('entree','produits','fournisseurs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produit =$this->produitRepository->getById($request->produit_id);
        $entree = $this->entreeRepository->getById($id);
        $produit->quantite =( $produit->quantite +$request->quantite) - $entree->quantite;
        $this->produitRepository->updateQuantite($produit->id,$produit->quantite);
        $this->entreeRepository->update($id, $request->all());
        return redirect('admin/entree');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->entreeRepository->destroy($id);
        return redirect('admin/entree');
    }
}
