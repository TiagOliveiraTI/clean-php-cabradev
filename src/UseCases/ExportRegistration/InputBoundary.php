<?php

declare (strict_types=1);

namespace App\UseCases\ExportRegistration;

class InputBoundary
{
    public function __construct(private string $registrationNumber)
    {
        
    }

    /**
     * Get the value of registrationNumber
     *
     * @return  string
     */
    public function getRegistrationNumber()
    {
        return $this->registrationNumber;
    }
}
