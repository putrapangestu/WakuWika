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
        return $this->model->all();
    }

    public function getMinuman(mixed $column, mixed $data): mixed
    {
        return $this->model->where($column,$data)->firstOrFail();
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

    public function getDiskName(): string
    {
        return ('Gammbar_Minuman');
    }
}