<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DrainaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'kelurahan_id'    => 'required|exists:kelurahan,id',
            'nama_lokasi'     => 'required|string|max:150',
            'panjang_meter'   => 'required|numeric|min:0',
            'lebar_cm'        => 'required|numeric|min:0',
            'jenis_drainase'  => 'required|in:Terbuka,Tertutup,Gorong-gorong',
            'kondisi'         => 'required|in:Baik,Tersumbat,Rusak',
            'tahun_pendataan' => 'required|integer|digits:4|min:2000|max:' . date('Y'),
            'keterangan'      => 'nullable|string',
        ];
    }
}
