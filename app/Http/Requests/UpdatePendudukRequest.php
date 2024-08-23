<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePendudukRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nik' => 'required|unique:penduduks,nik,' . $this->penduduk->id,
            'nama' => 'required|max:50',
            'password' => 'required|min:8',
            'JK' => 'required|in:L,P',
            'alamat' => 'required',
        ];
    }
}
