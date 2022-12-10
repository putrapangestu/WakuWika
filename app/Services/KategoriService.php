<?php

namespace App\Services;

use App\Models\Kategori;
use App\Request\KategoriRequest;
use App\Repositories\KategoriRepository;
use Illuminate\Http\Request;

class KategoriService
{
    private $repository;

    function __construct(KategoriRepository $kategoriRepository)
    {
        $this->repository = $kategoriRepository;
    }

    public function fetchKategori()
    {
        return $this->repository->getAllKategori();
    }

    public function Tambah(KategoriRequest $request): void
    {   
        $validated = $request->validated();
        Kategori::create([
            "nama" => $validated['nama']
        ]);
    }

}