<?php

namespace spec\App\UseCases\ExportRegistration;

use PhpSpec\ObjectBehavior;
use App\Domain\ValueObjects\Cpf;
use App\Domain\ValueObjects\Email;
use App\Domain\Entities\Registration;
use App\UseCases\ExportRegistration\InputBoundary;
use App\UseCases\ExportRegistration\OutputBoundary;
use App\Domain\Repositories\LoadRegistrationRepository;
use App\UseCases\ExportRegistration\ExportRegistration;

class ExportRegistrationSpec extends ObjectBehavior
{
    const VALID_CPF = '904.554.270-62';

    public function let(LoadRegistrationRepository $repository)
    {
        $this->beConstructedWith($repository);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ExportRegistration::class);
    }

    public function it_handle_should_return_an_output_boundary_with_the_registration_data(
        LoadRegistrationRepository $repository,
        InputBoundary $inputBoundary,
        OutputBoundary $outputBoundary
    ) {
        $cpf = new Cpf(self::VALID_CPF);
        $repository->loadByRegistrationNumber($cpf)->willReturn($outputBoundary);
    }
    
}
