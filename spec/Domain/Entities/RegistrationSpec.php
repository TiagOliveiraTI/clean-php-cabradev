<?php

namespace spec\App\Domain\Entities;

use PhpSpec\ObjectBehavior;

use App\Domain\ValueObjects\Cpf;
use App\Domain\ValueObjects\Email;
use App\Domain\Entities\Registration;
use DomainException;

class RegistrationSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Registration::class);
    }

    public function it_should_have_a_name()
    {
        $this->setName('John Doe');
        $this->getName()->shouldBe('John Doe');
    }

    public function it_should_have_a_email()
    {
        $email = new Email('valid_email@gmail.com');
        $this->setEmail($email);
        $this->getEmail()->shouldBe($email);
    }

    public function it_should_have_a_cpf()
    {
        $cpf = new Cpf('904.554.270-62');
        $this->setRegistrationNumber($cpf);
        $this->getRegistrationNumber()->shouldBe($cpf);
    }

    public function it_should_have_a_date_of_registration()
    {
        $this->setDateOfRegistration(new \DateTime());
        $this->getDateOfRegistration()->shouldBeAnInstanceOf(\DateTime::class);
    }

    public function it_should_have_a_registration_at()
    {
        $this->setRegistrationAt(new \DateTime());
        $this->getRegistrationAt()->shouldBeAnInstanceOf(\DateTime::class);
    }
}
