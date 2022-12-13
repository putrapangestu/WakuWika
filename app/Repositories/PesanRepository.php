<?php

namespace App\Repositories;

use App\Models\Order;

class PesanRepository
{
    private $model;

    function __construct(Order $order)
    {
        $this->model = $order;
    }

    public function getAllPesanan()
    {
        return $this->model->with("minuman")->get();
    }

    public function getPesanan(string $id)
    {
        return $this->model->with("minuman")->findOrFail($id);
    }

    public function tambahData(array $data)
    {
        return $this->model->create($data);
    }

    public function editData(string $id, array $data)
    {
        return $this->getPesanan($id)->update($data);
    }
}