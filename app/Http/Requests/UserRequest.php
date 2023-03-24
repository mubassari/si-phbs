<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'nama'     => 'required|string',
            'telpon'   => [
                'required',
                'numeric',
                'starts_with:08,62',
                'regex:/^(62|08)[2-9][0-9]{7,10}$/',
                'unique:users,telpon,'.($this->user ? $this->user->id : NULL)
            ],
            'alamat'   => 'required|string',
            'foto_ktp' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];

        // Check if the request is for updating an existing record
        if ($this->getMethod() == 'PUT' || $this->getMethod() == 'PATCH') {
            // Skip validation for foto_ktp if input is empty
            if (!$this->hasFile('foto_ktp')) {
                unset($rules['foto_ktp']);
            }
        }

        return $rules;
    }
}
