<?php

namespace App\Http\Requests\Helpdesk;
use App\Rules\cpf;
use App\Rules\cell;
use Illuminate\Foundation\Http\FormRequest;

class frmUticRequest extends FormRequest
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

    public function messages()
    {
            return [
                'tipo.required' => 'O tipo é obrigatório.',
                'tipo.in' => 'O tipo deve ser padrão ou gestão de usuário.',
                'descricao.required' => 'A descrição é obrigatória',
                'nome_completo.required_if' => 'O nome completo é obrigatório para o tipo gestão de usuário.',
                'cpf.required_if' => 'O CPF é obrigatório para o tipo gestão de usuário.',
                'data_nascimento.required_if' => 'A data de nascimento é obrigatória para o tipo gestão de usuário.',
                'celular.required_if' => 'O celular é obrigatório para o tipo gestão de usuário.',
                'sexo.required_if' => 'O sexo é obrigatório para o tipo gestão de usuário.',
                'coligada.required_if' => 'A coligada é obrigatória para o tipo gestão de usuário.',
            ];
    }
}


