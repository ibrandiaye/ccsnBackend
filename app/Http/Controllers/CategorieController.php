<?php

namespace App\Http\Controllers;

use App\Repositories\CategorieRepository;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    protected $categorieRepository;

    public function __construct(CategorieRepository $categorieRepository){
        $this->categorieRepository =$categorieRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categorieRepository->getAll();
        return view('admin.categorie.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorie.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories = $this->categorieRepository->store($request->all());
        return redirect('admin/categorie');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorie = $this->categorieRepository->getById($id);
        return view('admin.categorie.show',compact('categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = $this->categorieRepository->getById($id);
        return view('admin.categorie.edit',compact('categorie'));
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
        $this->categorieRepository->update($id, $request->all());
        return redirect('admin/categorie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categorieRepository->destroy($id);
        return redirect('admin/categorie');
    }

    //for APi
    public function allCategories()
    {
        $categories = $this->categorieRepository->getAll();
        return response()->json($categories);
    }
}
