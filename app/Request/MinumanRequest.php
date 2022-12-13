<?php

namespace App\Request;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MinumanRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            "nama" => "required",
            "id_kategori" => "required",
            "pilihan" => "required",
            "harga" => "required|digits_between:0,100",
            "gambar" => "image|mimes:jpeg,jpg,png",
        ];
    }

    public function message(): array
    {
        return [
            "nama.required" => "Nama minuman tidak boleh kosong",
            "id_kategori.required" => "Kategori minuman tidak boleh kosong",
            "pilihan.required" => "Pilihan minuman tidak boleh kosong",
            "harga.required" => "Harga minuman tidak boleh kosong",
            "harga.digits_between" => "Harga minuman harus berupa angka",
            "gambar.image" => "Gambar harus berupa file image",
            "gambar.mimes" => "Gambar minuman harus berupa jpeg/jpg atau png",
        ];
    }
}