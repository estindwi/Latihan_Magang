<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasienRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
{
    return [
        'nik'           => 'required|digits:16|unique:pasiens,nik',
        'nama'          => 'required|string|max:255',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'tempat_lahir'  => 'required|string|max:255',  // ✅ tambahin ini
        'tanggal_lahir' => 'required|date',
        'alamat'        => 'required|string',
        'no_hp'         => 'required|string|min:10|max:20',
    ];
}

}
