<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Services\KategoriService;
use App\Request\KategoriRequest;

class KategoriController extends Controller
{
    private $kategoriService;

    function __construct(KategoriService $kategoriService){
        $this->kategoriService = $kategoriService;
    }

    public function halaman(){
        return view("admin.pesanan.kategori");
    }

    public function showItem($id){
        $kategori = $this->kategoriService->kategoriById($id);
        return view('admin.pesanan.kategoriEdit',compact('kategori'));
    }

    public function tambah(KategoriRequest $request){
        $this->kategoriService->Tambah($request);
        return redirect()->back();
    }

    public function edit(KategoriRequest $request, string $id)
    {
        $this->kategoriService->edit($request,$id);
        return redirect("admin");
    }

    public function hapus(string $id)
    {
        $this->kategoriService->hapus($id);
        return redirect()->back();
    }
}
