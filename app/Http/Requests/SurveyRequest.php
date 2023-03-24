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
        return [
            'pertanyaan' => 'required|string',
            'jawaban.*' => 'required|string',
            'nilai.*' => 'required|numeric|not_in:0',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        foreach ($this->get('nilai') as $key => $value) {
            $messages['nilai.'.$key.'.not_in'] = 'Isian ini wajib diisi';
        }
        return $messages;
    }
}
