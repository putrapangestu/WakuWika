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

    public function minumanById(string $id)
    {
        return $this->minumanRepo->getMinuman($id);
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

    public function edit(MinumanRequest $request,string $id)
    {
        $validated = $request->validated();
        $show = $this->minumanRepo->getMinuman($id);
        $old_photo  = $show->gambar;
        if ($request->hasFile('gambar')) {
            if (!is_null($old_photo)) UploadHelper::handleRemove($old_photo);
            $old_photo = UploadHelper::handleUpload($request->file('gambar'), $this->minumanRepo->getDiskName());
        }
        $this->minumanRepo->updateData($id,[
            "nama" => $validated["nama"],
            "id_kategori" => $validated["id_kategori"],
            "pilihan" => $validated["pilihan"],
            "harga" => $validated["harga"],
            "gambar" => $old_photo
        ]); 
    }

    public function hapus(string $id)
    {
        $show = $this->minumanRepo->getMinuman($id);

        if($show && !is_null($show->gambar)) UploadHelper::handleRemove($show->gambar);

        $this->minumanRepo->hapusData($id);
    }
    
}