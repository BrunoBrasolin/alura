<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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
            // 'nome_do_campo' => 'regra1|regra2' // Regras separadas por |; disponivel na documentacao do laravel
            'nome' => 'required'
        ];
    }

    public function messages()
    {
        return[
            // 'nome da regra' => 'mensagem
            'required' => 'O campo :attribute é onrigatório'
        ];
    }
}
