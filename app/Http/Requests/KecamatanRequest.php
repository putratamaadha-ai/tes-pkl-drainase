<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KecamatanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Ambil ID dari parameter rute untuk mengabaikan pengecekan unik saat proses edit/update
        $kecamatanId = $this->route('kecamatan');

        return [
            'nama_kecamatan' => 'required|string|max:100|unique:kecamatan,nama_kecamatan,' . $kecamatanId,
        ];
    }

    public function messages(): array
    {
    return [
        'nama_kecamatan.unique' => 'Nama kecamatan sudah ada.',
        'nama_kecamatan.required' => 'Nama kecamatan wajib diisi.',
        ];
    }
}