<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Request\MinumanRequest;
use App\Models\{Kategori,Minuman};
use App\Repositories\MinumanRepository;
use App\Helpers\UploadHelper;

class MinumanService
{
    private $minumanRepository;

    function __construct(MinumanRepository $minumanRepository)
    {
        $this->minumanRepo = $minumanRepository;
    }
    
    public function fetchMinuman(): object
    {
        return $this->minumanRepo->getAllMinuman();
    }

    public function Tambah(MinumanRequest $request)
    {
        $validated = $request->validated();
        // $old_photo  = $this->fetchUserSession()->photo;

        if ($request->hasFile('gambar')) {
            // if (!is_null($old_photo)) UploadHelper::handleRemove($old_photo);

            $old_photo = UploadHelper::handleUpload($request->file('gambar'), $this->minumanRepo->getDiskName());
        }
        Minuman::create([
            "nama" => $validated["nama"],
            "id_kategori" => $validated["id_kategori"],
            "pilihan" => $validated["pilihan"],
            "harga" => $validated["harga"],
            "gambar" => $old_photo
        ]);
    }
    
}