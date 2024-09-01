<?php

namespace App\Http\Controllers;

use App\Repositories\CategorieRepository;
use App\Repositories\ProduitRepository;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    protected $produitRepository;
    protected $categorieRepository;

    public function __construct(ProduitRepository $produitRepository, CategorieRepository $categorieRepository){
        $this->produitRepository =$produitRepository;
        $this->categorieRepository = $categorieRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = $this->produitRepository->getAll();
        return view('admin.produit.index',compact('produits'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = $this->categorieRepository->getAll();
        return view('admin.produit.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request['photo']){
            $destinationPath = 'photo/'; // upload path
            $file = $request['photo'];
            $docName = time().".". $file->getClientOriginalExtension();
            $file->move($destinationPath, $docName);
            $request->merge(['image'=>$docName]);
        }
        $produits = $this->produitRepository->store($request->all());
        return redirect('admin/produit');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produit = $this->produitRepository->getById($id);
        return view('admin.produit.show',compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->categorieRepository->getAll();
        $produit = $this->produitRepository->getById($id);
        return view('admin.produit.edit',compact('produit','categories'));
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
        if($request['photo']){
            $destinationPath = 'photo/'; // upload path
            $file = $request['photo'];
            $docName = time().".". $file->getClientOriginalExtension();
            $file->move($destinationPath, $docName);
            $request->merge(['image'=>$docName]);
        }
        $this->produitRepository->update($id, $request->all());
        return redirect('admin/produit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->produitRepository->destroy($id);
        return redirect('admin/produit');
    }

    //for APi
    public function allProduit()
    {
        $produits = $this->produitRepository->getAll();
        return response()->json($produits);
    }
}
