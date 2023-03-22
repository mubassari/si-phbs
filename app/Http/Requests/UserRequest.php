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
        return [
            'nama'     => 'required|string',
            'telpon'   => 'required|numeric|regex:/^(\62|0)[0-9]{9,13}$/"unique:users,no_telp,'.$this->user->id,
            'alamat'   => 'required|string',
            'foto_ktp' => 'required|image|max:4000',
        ];
    }
}
