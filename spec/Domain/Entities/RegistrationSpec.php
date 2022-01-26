<?php

namespace spec\App\Domain\Entities;

use App\Domain\Entities\Registration;
use PhpSpec\ObjectBehavior;

class RegistrationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Registration::class);
    }
}
