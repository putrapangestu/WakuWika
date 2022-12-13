<?php

namespace App\Request;

use Illuminate\Foundation\Http\FormRequest;

class ActivityRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "email" => "required|exists:users,email",
            "password" => "required|min:8"
        ];
    }

    public function message(): array
    {
        return [
            "email.required" => "Email tidak boleh kosong",
            "email.exists" => "Email tidak ditemukan",
            "password.required" => "Password tidak boleh kosong",
            "password.min" => "Password tidak boleh kurang dari 8",
        ];
    }
}