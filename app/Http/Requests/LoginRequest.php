<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'telpon'   => [
                'required',
                'numeric',
                'starts_with:08,62',
                'regex:/^(62|08)[0-9]{9,13}$/',
                'exists:users,telpon',
            ],
            'password' => 'required',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        // checks user current password
        // before making changes
        $validator->after(function ($validator) {
            $user = \App\Models\User::where('telpon', $this->telpon)->first('password');
            if($user){
                if (!\Illuminate\Support\Facades\Hash::check($this->password, $user->password)) {
                    $validator->errors()->add('password', 'Kata sandi tidak tepat.');
                }
            }
        });
    }
}
