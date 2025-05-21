<?php
namespace App\Rules;
//PASTABA
//nuo Laravel 9 versijos naudojama  ValidationRule vietoje Rule  ziureti kita byla ValidLithuanianPersonalCode_old_LAR_ver_method.php
//sis budas yra naujesnis, bet galima naudoti ir Rule

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidLithuanianPersonalCode implements ValidationRule
{
    // Validacijos logika
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!is_numeric($value) || strlen($value) !== 11) {
            $fail('Asmens kodas turi būti lygiai 11 skaitmenų.');
            return;
        }

        if (!$this->validatePersonalCode($value)) {
            $fail('Asmens kodas neatitinka kontrolinio skaičiaus.');
            return;
        }
    }

    // Tikrinimo metodas
    private function validatePersonalCode($code): bool
    {
        $weightsFirst = [1, 2, 3, 4, 5, 6, 7, 8, 9, 1];
        $weightsSecond = [3, 4, 5, 6, 7, 8, 9, 1, 2, 3];

        $checkSum = 0;
        for ($i = 0; $i < 10; $i++) {
            $checkSum += $code[$i] * $weightsFirst[$i];
        }

        $remainder = $checkSum % 11;
        if ($remainder === 10) {
            $checkSum = 0;
            for ($i = 0; $i < 10; $i++) {
                $checkSum += $code[$i] * $weightsSecond[$i];
            }
            $remainder = $checkSum % 11;
            if ($remainder === 10) {
                $remainder = 0;
            }
        }

        return (int) $code[10] === $remainder;
    }
}
