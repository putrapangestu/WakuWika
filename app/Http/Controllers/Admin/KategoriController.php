<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Services\KategoriService;
use App\Request\KategoriRequest;

class KategoriController extends Controller
{
    private $kategoris;

    function __construct(KategoriService $kategoriService){
        $this->kategoris = $kategoriService;
    }

    public function halaman(){
        return view("admin.pesanan.kategori");
    }

    public function tambah(KategoriRequest $request){
        $this->kategoris->Tambah($request);
        return redirect()->back();
    }
}
