<?php

namespace App\Http\Requests\Helpdesk;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\cpf;
use App\Rules\cell;

class frmUticGestaoUsuarioRequest extends FormRequest
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
            'tipo' => 'required|in:Padrão,gestaoUsuario',
            'descricao' => 'required|string|max:255',
            'nome_completo' => 'nullable|required_if:tipo,gestaoUsuario|string|max:255',
            'cpf' => ['nullable', 'required_if:tipo,gestaoUsuario', new cpf],
            'data_nascimento' => 'nullable|required_if:tipo,gestaoUsuario|date',
            'celular' => ['nullable','required_if:tipo,gestaoUsuario',new cell],
            'sexo' => 'nullable|required_if:tipo,gestaoUsuario|in:Masculino,Feminino',
            'coligada' => 'nullable|required_if:tipo,gestaoUsuario|in:Sede,Airton Dias,Atendimento Rorainópolis,Ville Roy',
        ];
    }

    public function messages(): array
    {
        return [
            'tipo.required' => 'O campo tipo é obrigatório.',
            'tipo.in' => 'O campo tipo deve ser um dos seguintes valores: Padrão, gestaoUsuario.',
            'descricao.required' => 'O campo descrição é obrigatório.',
            'descricao.string' => 'O campo descrição deve ser uma string.',
            'descricao.max' => 'O campo descrição não pode ter mais de 255 caracteres.',
            'nome_completo.required_if' => 'O campo nome completo é obrigatório quando o tipo é gestaoUsuario.',
            'nome_completo.string' => 'O campo nome completo deve ser uma string.',
            'nome_completo.max' => 'O campo nome completo não pode ter mais de 255 caracteres.',
            'cpf.required_if' => 'O campo CPF é obrigatório quando o tipo é gestaoUsuario.',
            'cpf.valid' => 'O campo CPF deve ser um CPF válido.',
            'data_nascimento.required_if' => 'O campo data de nascimento é obrigatório quando o tipo é gestaoUsuario.',
            'data_nascimento.date' => 'O campo data de nascimento deve ser uma data válida.',
            'celular.required_if' => 'O campo celular é obrigatório quando o tipo é gestaoUsuario.',
            'celular.valid' => 'O campo celular deve ser um número de celular válido.',
            'sexo.required_if' => 'O campo sexo é obrigatório quando o tipo é gestaoUsuario.',
            'sexo.in' => 'O campo sexo deve ser um dos seguintes valores: Masculino, Feminino.',
            'coligada.required_if' => 'O campo coligada é obrigatório quando o tipo é gestaoUsuario.',
            'coligada.in' => 'O campo coligada deve ser um dos seguintes valores: Sede, Airton Dias, Atendimento Rorainópolis, Ville Roy.',
        ];
    }

}
