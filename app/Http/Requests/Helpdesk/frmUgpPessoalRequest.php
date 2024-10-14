<?php

namespace App\Http\Requests\Helpdesk;

use Illuminate\Foundation\Http\FormRequest;

class frmUgpPessoalRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'descricao-ugp' => 'required|string|max:255',
            'tipo-ugp' => 'required|in:padrao,gestaoUsuario'
        ];
    }

    public function messages(){
        return [
            'tipo.required' => 'O tipo é obrigatório.',
            'descricao.required' => 'A descrição é obrigatória'
        ];
    }
}
