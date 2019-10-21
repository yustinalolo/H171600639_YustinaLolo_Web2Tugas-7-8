<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;
use App\KategoriArtikel;

class KategoriArtikelController extends Controller
{
    public function index(){
        
        $listKategoriArtikel=Artikel::all(); 

        return view ('kategori_artikel.index',compact('listKategoriArtikel'));
        //return view ('artikel.index'->with('data',$listArtikel);
    }

    public function show($id) {

        //$Artikel=Artikel::where('id',$id)->first();
        $KategoriArtikel=KategoriArtikel::find($id);

        return view ('kategori_artikel.show', compact('KategoriArtikel'));
        
    }

    public function create(){

        $KategoriArtikel=KategoriArtikel::pluck('nama','id');
        
        return view('kategori_artikel.create', compact('KategoriArtikel'));
    }

    public function store(Request $request){

        $input= $request->all();

        KategoriArtikel::create($input);

        return redirect(route('kategori_artikel.index'));
    }

     public function edit($id){
        $listKategoriArtikel=KategoriArtikel::find($id);
        $KategoriArtikel=KategoriArtikel::pluck('nama','id');

        if(empty($listArtikel)){
            return redirect(route('kategori_artikel.index'));
        }

            return view('artikel.edit', compact('listArtikel','KategoriArtikel'));
    }

    public function update($id, Request $request){
        $listKategoriArtikel=KategoriArtikel::find($id);
        $input= $request->all();

        if(empty($listKategoriArtikel)){
            return redirect(route('Kategori_artikel.index'));
        }

        $listKategoriArtikel->update($input);

        return redirect(route('kategori_artikel.index'));
    }

    public function destroy($id){
        $listKategoriArtikel=KategoriArtikel::find($id);

        if(empty($listArtikel)){
            return redirect(route('kategori_artikel.index'));
        }

        $listKategoriArtikel->delete();

        return redirect(route('kategori_artikel.index'));
    }

    public function trash(){
        
        $listKategoriArtikel=KategoriArtikel::onlyTrashed()
                    ->whereNotNull('deleted_at')
                    ->get();

        return view ('kategori_artikel.index',compact('listKategoriArtikel'));
       
    }
}