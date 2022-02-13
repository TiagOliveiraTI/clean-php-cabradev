<?php

namespace spec\App\Domain\ValueObjects;

use DomainException;
use PhpSpec\ObjectBehavior;
use App\Domain\ValueObjects\Email;

class EmailSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('valid@email.com');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Email::class);
    }

    public function it_should_have_a_email()
    {
        $this->__toString()->shouldBe('valid@email.com');
    }

    public function it_should_throw_an_exception_when_email_is_invalid()
    {
        $this->beConstructedWith('invalid_email');
        $this->shouldThrow(new DomainException('Invalid email'))->duringInstantiation();
    }

    public function it_should_not_set_a_null_email()
    {
        $this->beConstructedWith(null);
        $this->shouldThrow(new DomainException('Email is required'))->duringInstantiation();
    }
}
