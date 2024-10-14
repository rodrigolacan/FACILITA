<?php

namespace App\Http\Requests\Helpdesk;

use Illuminate\Foundation\Http\FormRequest;

class frmUsrLoja extends FormRequest
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
            'gestor-responsavel' => 'required',
            'canal' => 'required',
            'acao' => 'required',
            'codsas-nome' => 'required',
            'modo' => 'required',
            'investimento' => 'required',
            'loja-alterar' => 'required_if:acao,Alterar',
            'loja-unidade' => 'required_if:acao,Publicar',
            'loja-projeto' => 'required_if:acao,Publicar',
            'loja-acao' => 'required_if:acao,Publicar',
        ];
    }

    public function messages()
    {
        return [
            'gestor-responsavel.required' => 'O campo Gestor Responsável é obrigatório.',
            'canal.required' => 'O campo Canal é obrigatório.',
            'acao.required' => 'O campo Ação é obrigatório.',
            'codsas-nome.required' => 'O campo Código do SAS e Nome é obrigatório.',
            'modo.required' => 'O campo Tipo é obrigatório.',
            'investimento.required' => 'O campo Investimento é obrigatório.',
            'loja-unidade.required_if' => 'O campo Unidade é obrigatório para Publicar.',
            'loja-projeto.required_if' => 'O campo Projeto é obrigatório para Publicar.',
            'loja-acao.required_if' => 'O campo Ação é obrigatório para Publicar.',
            'loja-alterar.required_if' => 'O campo de Demanda é obrigatório para Alterar.',
            'link-evento-loja.required' => 'O campo Link de Evento da Loja é obrigatório.',
        ];
    }
}
