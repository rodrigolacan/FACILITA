<?php
namespace App\Rules;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class cpf implements ValidationRule
{
    public function validate($attribute, $value, Closure $fail): void
    {
        // Remove caracteres não numéricos
        $cpf = preg_replace('/[^0-9]/', '', $value);
    
        // Verifica se o CPF contém apenas letras
        if (ctype_alpha($cpf)) {
            $fail("O CPF não pode conter apenas letras.");
            return;
        }

        // Verifica se o CPF possui pelo menos 11 dígitos
        if (strlen($cpf) != 11) {
            $fail("O CPF deve conter exatamente 11 dígitos numéricos.");
            return;
        }
    
        // Verifica se todos os dígitos são iguais (caso contrário, não é um CPF válido)
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            $fail("CPF inválido: todos os dígitos são iguais.");
            return;
        }
    
        // Calcula e verifica o primeiro dígito verificador
        $sum = 0;
        for ($i = 0; $i < 9; $i++) {
            $sum += $cpf[$i] * (10 - $i);
        }
        $remainder = $sum % 11;
        $digit1 = ($remainder < 2) ? 0 : 11 - $remainder;
    
        if ($cpf[9] != $digit1) {
            $fail("O primeiro dígito verificador do CPF é inválido.");
            return;
        }
    
        // Calcula e verifica o segundo dígito verificador
        $sum = 0;
        for ($i = 0; $i < 10; $i++) {
            $sum += $cpf[$i] * (11 - $i);
        }
        $remainder = $sum % 11;
        $digit2 = ($remainder < 2) ? 0 : 11 - $remainder;
    
        if ($cpf[10] != $digit2) {
            $fail("O segundo dígito verificador do CPF é inválido.");
            return;
        }
    }
    
}
