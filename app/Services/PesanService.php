<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\PesanRepository;

class PesanService
{
    private $pesanRepo;

    function __construct(PesanRepository $pesanRepository)
    {
        $this->pesanRepo = $pesanRepository;
    }

    public function fetchPesanan()
    {
        return $this->pesanRepo->getAllPesanan();
    }

    public function pesananById(string $id)
    {
        return $this->pesanRepo->getPesanan($id);
    }

    public function tambah(Request $request, string $id)
    {
        $this->pesanRepo->tambahData([
            "minuman_id" => $id,
            "nama" => $request->nama,
            "meja" => $request->meja,
            "jumlah" => $request->jumlah,
        ]);
    }

    public function edit(string $id)
    {
        $this->pesanRepo->editData($id, ["status" => "sudah"]);
    }
}