<?php

declare(strict_types=1);

namespace spec\App\Domain\ValueObjects;

use App\Domain\ValueObjects\Cpf;
use PhpSpec\ObjectBehavior;

class CpfSpec extends ObjectBehavior
{
    const INVALID_CPF = 'Invalid CPF';
    const VALID_CPF = '904.554.270-62';

    public function it_is_initializable()
    {
        $this->shouldHaveType(Cpf::class);
    }

    public function let()
    {
        $this->beConstructedWith('22222222222');
    }

    public function it_should_not_be_null()
    {
        $this->beConstructedWith(null);
        $this->shouldThrow(new \DomainException('CPF is required'))->duringInstantiation();
    }
    public function it_cpf_should_be_different_of_less_than_11_characters()
    {
        $this->beConstructedWith('2222222222');
        $this->shouldThrow(new \DomainException('Invalid CPF'))->duringInstantiation();
    }

    public function it_cpf_should_be_different_of_more_than_11_characters()
    {
        $this->beConstructedWith('222222222222');
        $this->shouldThrow(new \DomainException('Invalid CPF'))->duringInstantiation();
    }

    public function it_cpf_should_be_different_of_a_sequence_of_numbers()
    {
        $this->beConstructedWith('11111111111');
        $this->shouldThrow(new \DomainException('Invalid CPF'))->duringInstantiation();
    }

    public function it_cpf_should_be_different_of_a_sequence_of_letters()
    {
        $this->beConstructedWith('aaaaaaaaaa');
        $this->shouldThrow(new \DomainException('Invalid CPF'))->duringInstantiation();
    }

    public function it_cpf_should_be_different_of_a_sequence_of_letters_and_numbers()
    {
        $this->beConstructedWith('aaaaaa223345');
        $this->shouldThrow(new \DomainException('Invalid CPF'))->duringInstantiation();
    }

    public function it_should_not_be_a_valid_cpf_because_first_calculation_is_invalid()
    {
        $this->beConstructedWith('904.554.270-11');
        $this->shouldThrow(new \DomainException(self::INVALID_CPF))->duringInstantiation();
    }

    public function it_should_not_be_a_valid_cpf_because_second_calculation_is_invalid()
    {
        $this->beConstructedWith('904.554.270-61');
        $this->shouldThrow(new \DomainException(self::INVALID_CPF))->duringInstantiation();
    }
}
