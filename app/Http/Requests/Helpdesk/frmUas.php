<?php

namespace App\Http\Requests\Helpdesk;

use Illuminate\Foundation\Http\FormRequest;

class frmUas extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public static function rules(): array
    {
        return [
            'descricao' => 'required',
            'tipo' => 'required',
        ];
    }

    public function messages(){
        return [
            'descricao.required' => 'O campo Descrição é obrigatório',
            'tipo.required' => 'O tipo é obrigatório.'
        ];
    }
}
