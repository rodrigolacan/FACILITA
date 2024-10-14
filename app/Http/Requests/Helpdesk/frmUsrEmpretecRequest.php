<?php

namespace App\Http\Requests\Helpdesk;

use Illuminate\Foundation\Http\FormRequest;

class frmUsrEmpretecRequest extends FormRequest
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
            'responsavel' => 'required|string|max:255',
            'servico' => 'required',
            'valor-total' => 'required',
            'data_inicio' => 'required',
            'objeto' => 'required',
            'justificativa' => 'required',
            'publico-alvo' => 'required',
            'pessoas-atendidas' =>'required',
            'local-servico' => 'required',
            'produto-servico' => 'required',
            'sugestao' => 'required',
            'detalhamento-entrega' => 'required',
            'projeto' => 'required',
            'acao' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'responsavel.required' => 'O campo responsável pela contratação é obrigatório.',
            'responsavel.string' => 'O campo responsável pela contratação deve ser uma string.',
            'responsavel.max' => 'O campo responsável pela contratação não pode ter mais de :max caracteres.',
            'servico.required' => 'O campo forma de prestação de serviços é obrigatório.',
            'valor-total.required' => 'O campo valor total estimado é obrigatório.',
            'data_inicio.required' => 'O campo previsão de início é obrigatório.',
            'objeto.required' => 'O campo objeto é obrigatório.',
            'justificativa.required' => 'O campo justificativa é obrigatório.',
            'publico-alvo.required' => 'O campo público alvo é obrigatório.',
            'pessoas-atendidas.required' => 'O campo número de pessoas atendidas é obrigatório.',
            'local-servico.required' => 'O campo local da prestação de serviços é obrigatório.',
            'produto-servico.required' => 'O campo produto/serviço é obrigatório.',
            'sugestao.required' => 'O campo sugestão de área e subárea é obrigatório.',
            'detalhamento-entrega.required' => 'O campo detalhamento das entregas por mês cronologicamente é obrigatório.',
            'projeto.required' => 'O campo projeto é obrigatório.',
            'acao.required' => 'O campo ação é obrigatório.'
        ];
    }

}
