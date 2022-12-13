<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Request\MinumanRequest;
use App\Models\{Minuman,Kategori};
use App\Services\{KategoriService,MinumanService};

class MinumanController extends Controller
{
    private $kategoriService,$minumanService;

    function __construct(KategoriService $kategoris, MinumanService $minumans)
    {
        $this->kategoriService = $kategoris;
        $this->minumanService = $minumans;
    }

    public function halaman()
    {
        $kategoris = $this->kategoriService->fetchKategori();
        return view("admin.pesanan.tambah",compact('kategoris'));
    }

    public function halaman2(string $id)
    {
        $minuman = $this->minumanService->minumanById($id);
        $kategoris = $this->kategoriService->fetchKategori();
        return view("admin.pesanan.minumanEdit",compact('minuman','kategoris'));
    }

    public function item(){
        $minumans = $this->minumanService->fetchMinuman();
        return view('index')->with(compact('minumans'));
    }
    
    public function item2(){
        $minumans = $this->minumanService->fetchMinuman();
        $kategoris = $this->kategoriService->fetchKategori();
        return view('admin.index')->with(compact('minumans','kategoris'));
    }
    
    public function tambah(MinumanRequest $request)
    {
        $this->minumanService->Tambah($request);
        // return redirect()->back();
        return redirect("admin");
    }

    public function edit(MinumanRequest $request, string $id)
    {
        $this->minumanService->edit($request,$id);
        return redirect("admin");
    }

    public function hapus(string $id)
    {
        $this->minumanService->hapus($id);
        return redirect()->back();
    }
}
