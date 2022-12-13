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

    public function kategoriById($id){
        return $this->repository->getKategori($id);
    }

    public function Tambah(KategoriRequest $request): void
    {   
        $validated = $request->validated();
        Kategori::create([
            "nama" => $validated['nama']
        ]);
    }

    public function edit(KategoriRequest $request,string $id)
    {
        $validated = $request->validated();
        $this->repository->updateData($id,[
            "nama" => $validated['nama']
        ]); 
    }

    public function hapus(string $id)
    {
        $show = $this->repository->getKategori($id);

        if($show){
            $this->repository->hapusData($id);
        }
    }

}