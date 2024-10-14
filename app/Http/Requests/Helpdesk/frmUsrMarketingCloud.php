<?php

namespace App\Http\Requests\Helpdesk;

use Illuminate\Foundation\Http\FormRequest;

class frmUsrMarketingCloud extends FormRequest
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
    public static function rules(): array
    {
        return [
            'codigo-sas' => 'required',
            'evento' => 'required',
            'tipo-acao' => 'required',
            'publico-geral' => 'required',
            'objetivo' => 'required',
            'divulgacao-link' => 'nullable',
            'quantidade-disparos-semana' => 'required',
            'dias' =>'required',
            'turno' => 'required',
            'antecedencia-disparos' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'codigo-sas.required' => 'O campo código SAS é obrigatório.',
            'evento.required' => 'O campo evento é obrigatório.',
            'tipo-acao.required' => 'O campo tipo de ação é obrigatório.',
            'publico-geral.required' => 'O campo público geral é obrigatório.',
            'objetivo.required' => 'O campo objetivo é obrigatório.',
            'quantidade-disparos-semana.required' => 'O campo quantidade de disparos por semana é obrigatório.',
            'dias.required' => 'O campo dias é obrigatório.',
            'turno.required' => 'O campo turno é obrigatório.',
            'antecedencia-disparos.required' => 'O campo antecedência de disparos é obrigatório.',
        ];
    }
}
