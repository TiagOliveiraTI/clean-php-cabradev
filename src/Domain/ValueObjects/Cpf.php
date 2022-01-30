<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use DomainException;

class Cpf
{

    public function __construct(private ?string $cpf)
    {
        if (is_null($cpf)) {
            throw new DomainException('CPF is required');
        }

        if (!$this->isValid($cpf)) {
            throw new DomainException('Invalid CPF');
        }

        $this->cpf = $cpf;
    }

    public function isValid(string $cpf): bool
    {
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        if (strlen($cpf) != 11 || preg_match('/([0-9])\1{10}/', $cpf)) {
            return false;
        }

        $firstResult = $this->firstCalculation($cpf);
        $secondResult = $this->secondCalculation($cpf);

        if (!$firstResult || !$secondResult) {
            return false;
        }
        return true;
    }

    private function firstCalculation($cpf): bool
    {
        $sum = 0;
        $number_to_multiplicate = 10;
        $first_digit = substr($cpf, -2, 1);

        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        $cpf = substr($cpf, 0, 9);

        for ($i = 0; $i < 9; $i++) {
            $sum += (int) $cpf[$i] * $number_to_multiplicate;
            $number_to_multiplicate--;
        }

        $calc = ($sum * 10) % 11;

        if ($calc != $first_digit) {
            return false;
        }

        return true;

    }

    private function secondCalculation($cpf): bool
    {
        $sum = 0;
        $number_to_multiplicate = 11;
        $second_digit = substr($cpf, -1, 1);

        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        $cpf = substr($cpf, 0, 10);

        for ($i = 0; $i < 10; $i++) {
            $sum += (int) $cpf[$i] * $number_to_multiplicate;
            $number_to_multiplicate--;
        }

        $calc = ($sum * 10) % 11;

        if ($calc != $second_digit) {
            return false;
        }

        return true;
    }
}
