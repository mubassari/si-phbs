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
        $password_rule = $this->user ? 'sometimes' : 'required';
        $foto_ktp_rule = $this->user ? 'sometimes' : 'required';
        return [
            'nama'     => 'required|string',
            'telpon'   => [
                'required',
                'numeric',
                'starts_with:08,62',
                'regex:/^(62|08)[0-9]{9,13}$/',
                'unique:users,telpon,' . ($this->user ? $this->user->id : NULL)
            ],
            'password' => "$password_rule|confirmed|min:4",
            'alamat'   => 'required|string',
            'foto_ktp' => "$foto_ktp_rule|image|mimes:jpeg,png,jpg|max:2048",
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'password' => $this->password ?? substr($this->telpon, -4, 4),
            'password_confirmation' => $this->password ?? substr($this->telpon, -4, 4),
        ]);
    }
}
