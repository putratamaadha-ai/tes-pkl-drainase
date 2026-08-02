<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KelurahanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $kelurahanId = $this->route('kelurahan'); // Ambil ID saat proses update

        return [
            'kecamatan_id' => 'required|exists:kecamatan,id',
            'nama_kelurahan' => [
                'required',
                'string',
                'max:100',
                Rule::unique('kelurahan', 'nama_kelurahan')
                    ->where(function ($query) {
                        return $query->where('kecamatan_id', $this->kecamatan_id);
                    })
                    ->ignore($kelurahanId),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'kecamatan_id.required' => 'Kecamatan wajib dipilih.',
            'kecamatan_id.exists' => 'Kecamatan tidak valid.',
            'nama_kelurahan.required' => 'Nama kelurahan wajib diisi.',
            'nama_kelurahan.max' => 'Nama kelurahan maksimal 100 karakter.',
            'nama_kelurahan.unique' => 'Kelurahan tersebut sudah ada di kecamatan ini!',
        ];
    }
}