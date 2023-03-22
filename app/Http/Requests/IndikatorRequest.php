<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndikatorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'judul' => 'required|string',
            'isi'   => 'required|string',
            'foto'  => 'required|image|mimes:jpeg,png,jpg|max:4096',
        ];

        // Check if the request is for updating an existing record
        if ($this->getMethod() == 'PUT' || $this->getMethod() == 'PATCH') {
            // Skip validation for foto if input is empty
            if (!$this->hasFile('foto')) {
                unset($rules['foto']);
            }
        }

        return $rules;
    }
}
