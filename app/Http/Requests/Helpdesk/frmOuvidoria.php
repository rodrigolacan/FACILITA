<?php

namespace App\Http\Requests\Helpdesk;

use Illuminate\Foundation\Http\FormRequest;

class frmOuvidoria extends FormRequest
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
