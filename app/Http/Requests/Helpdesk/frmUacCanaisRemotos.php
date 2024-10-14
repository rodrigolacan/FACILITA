<?php

namespace App\Http\Requests\Helpdesk;

use Illuminate\Foundation\Http\FormRequest;

class frmUacCanaisRemotos extends FormRequest
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
            'descricao' => 'required',
            'tipo-acao' => 'required',
            'publico-alvo-uac' => 'required',
            'tipo' => 'required',
            'projeto-uac'   => 'required'
        ];
    }

    public function messages(){
        return [
            'descricao' => 'O campo Detalhamento de Demanda é obrigatório',
            'tipo-acao' => 'O campo Tipo da Ação é obrigatório',
            'publico-alvo-uac' => 'O campo Público Alvo é obrigatório',
            'tipo.required' => 'O campo Tipo é obrigatório',
            'projeto-uac.required' => 'O campo Projeto é obrigatório'
        ];
    }
}
