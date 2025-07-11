<?php

namespace App\Helpers;

class CPFValidator
{
    public static function isValid(string $cpf): bool
    {
        // Limpa caracteres não numéricos e espaços
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        // Verificações iniciais
        if (strlen($cpf) != 11 || preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Verifica os dois dígitos
        for ($t = 9; $t < 11; $t++) {
            $sum = 0;
            for ($i = 0; $i < $t; $i++) {
                $sum += $cpf[$i] * (($t + 1) - $i);
            }

            $digit = ((10 * $sum) % 11) % 10;

            if ((int) $cpf[$t] !== $digit) {
                return false;
            }
        }

        return true;
    }
}


