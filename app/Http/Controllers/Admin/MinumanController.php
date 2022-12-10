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

    public function tambah(MinumanRequest $request)
    {
        $this->minumanService->Tambah($request);
        // return redirect()->back();
        return redirect("admin");
    }
}
