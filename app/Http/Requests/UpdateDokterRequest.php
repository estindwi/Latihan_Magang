<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDokterRequest extends FormRequest
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
        $id = $this->route('dokter') ?? $this->route('id');

        return [
            'nama' => 'required|string|max:255',
            'spesialis' => 'required|string|max:255',

            // kalau ada sip dan kamu mau unique saat update:
            // 'sip' => 'required|string|unique:dokters,sip,' . $id,
        ];
    }
}
