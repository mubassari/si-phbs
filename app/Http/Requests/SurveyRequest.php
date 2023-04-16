<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SurveyRequest extends FormRequest
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
        $rules = ['pertanyaan' => 'required|string'];

        $preferensi = $this->request->get('preferensi', []);

        if (!empty($preferensi)) {
            foreach ($preferensi as $key => $val) {
                $rules["preferensi.{$key}.jawaban"] = 'required|string';
                $rules["preferensi.{$key}.nilai"]   = 'required|numeric|not_in:0';
            }
        } else {
            $rules['preferensi'] = 'required';
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        $messages = [
            'preferensi.required' => 'Preferensi wajib diisi.',
        ];

        $preferensi = $this->get('preferensi', []);

        if (!empty($preferensi)) {
            foreach ($this->get('preferensi') as $key => $value) {
                $messages["preferensi.{$key}.nilai.not_in"] = 'Isian ini wajib diisi';
            }
        }

        return $messages;
    }
}
