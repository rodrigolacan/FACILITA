<?php

namespace App\Http\Requests\Helpdesk;

use Illuminate\Foundation\Http\FormRequest;

class frmUsrProdutosInstataneos extends FormRequest
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
            'argumento' => 'required',
            'conteudo-progamatico' => 'required',
            'subtema' => 'required',
            'emite-certificado' => 'required',
            'pago' => 'required',
            'valor-pago' => 'required_if:pago,Sim'
        ];
    }

    public function messages(){
        return [
            'argumento.required' => 'O campo Argumento de Venda é obrigatório',
            'conteudo-progamatico.required' => 'O campo de Conteúdo Progamático é obrigatório',
            'subtema.required' => 'O campo de subtema é obrigatório',
            'pago.required' => 'O campo Pago é obrigatório',
            'emite-certificado.required' => 'O campo Emite Certificado é obrigatório',
            'valor-pago.required_if' => 'O campo valor pago está obrigatório'
        ];
    }
}
