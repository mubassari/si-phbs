<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        return [
            'nama'     => 'required|string',
            'telpon'   => [
                'required',
                'numeric',
                'starts_with:08,62',
                'regex:/^(62|08)[0-9]{9,13}$/',
                'unique:users,telpon'
            ],
            'password' => "required|confirmed|min:4",
            'password_confirmation' => 'required|same:password',
            'alamat'   => 'required|string',
            'foto_ktp' => "image|mimes:jpeg,png,jpg|max:2048",
        ];
    }
}
