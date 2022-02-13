<?php

declare(strict_types=1);

namespace App\UseCases\ExportRegistration;

use App\Domain\ValueObjects\Cpf;
use App\Domain\Repositories\LoadRegistrationRepository;
use DateTime;

class ExportRegistration
{
    public function __construct(private LoadRegistrationRepository $loadRegistrationRepository)
    {}

    public function handle(InputBoundary $inputBoundary): OutputBoundary
    {
        $cpf = new Cpf($inputBoundary->getRegistrationNumber());
        $registration = $this->loadRegistrationRepository->loadByRegistrationNumber($cpf);
        return new OutputBoundary([
            'name' => $registration->getName(),
            'email' => (string) $registration->getEmail(),
            'registration_number' => (string) $registration->getRegistrationNumber(),
            'date_of_registration' => $registration->getDateOfRegistration()->format(DateTime::ATOM),
            'registration_at' => $registration->getRegistrationAt()->format(DateTime::ATOM)
        ]);
    }
}
