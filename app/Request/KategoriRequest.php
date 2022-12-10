<?php

namespace App\Request;

use App\Models\Kategori;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class KategoriRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "nama" => ['required']
        ];
    }

    public function message(): array
    {
        return [
            "nama.required" => "Nama tidak boleh kosong"
        ];
    }
}