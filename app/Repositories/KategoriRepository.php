<?php

namespace App\Repositories;

use App\Models\Kategori;

class KategoriRepository
{
    // private

    function __construct(Kategori $kategori)
    {
        $this->model = $kategori;
    }

    public function getAllKategori(): object
    {
        return $this->model->all();
    }

    public function getKategori(mixed $column, mixed $data): mixed
    {
        return $this->model->where($column,$data)->firstOrFail();
    }

    public function whereKategori(mixed $column, mixed $data): mixed
    {
        return $this->model->where($column,$data)->get();   
    }

    public function limitResults(mixed $column, mixed $keyword, int $limit): mixed
    {
        return $this->model
            ->where($column, $keyword)
            ->take($limit)
            ->latest()
            ->get();
    }

    public function getDiskName(): string
    {
        return ('Gammbar_Kategori');
    }
}
