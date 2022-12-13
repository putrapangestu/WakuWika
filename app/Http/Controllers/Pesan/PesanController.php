<?php

namespace App\Http\Controllers\Pesan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\{MinumanService,PesanService};
use App\Request\PesanRequest;

class PesanController extends Controller
{
    private $minumanService,$pesanService;

    function __construct(MinumanService $minumanService, PesanService $pesanService)
    {
        $this->minumanService = $minumanService;
        $this->pesanService = $pesanService;
    }

    public function halaman(string $id)
    {
        $minuman = $this->minumanService->minumanById($id);
        return view("pesan",compact("minuman"));
    }

    public function halamanAdmin()
    {
        $pesanans = $this->pesanService->fetchPesanan();
        return view("admin.pesanan.index",compact("pesanans"));
    }

    public function tambah(Request $request,string $id)
    {
        $this->pesanService->tambah($request,$id);
        return redirect("/");
    }

    public function edit(string $id)
    {
        $this->pesanService->edit($id);
        return redirect()->back();
    }
}
