<?php

namespace App\Repositories;
use App\Models\{Kategori,Minuman};

class MinumanRepository
{
    // private 

    function __construct(Minuman $minuman)
    {
        $this->model = $minuman;
    }

    public function getAllMinuman(): object
    {
        return $this->model->with('kategori')->get();
    }

    public function getMinuman(string $id)
    {
        return $this->model->with('kategori')->findOrFail($id);
    }

    public function whereMinuman(mixed $column, mixed $data): mixed
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

    public function updateData(string $id, array $data)
    {
        return $this->getMinuman($id)->update($data);
    }

    public function hapusData(string $id)
    {
        return $this->getMinuman($id)->delete($id);
    }

    public function getDiskName(): string
    {
        return ('Gammbar_Minuman');
    }
}