<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

use App\Domain\ValueObjects\Cpf;
use App\Domain\ValueObjects\Email;
use App\Domain\Entities\Registration;
use App\UseCases\ExportRegistration\InputBoundary;
use App\Domain\Repositories\LoadRegistrationRepository;
use App\UseCases\ExportRegistration\ExportRegistration;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$registration = new Registration();
$registration->setName('John Doe');
$registration->setEmail(new Email('valid@email.com'));
$registration->setRegistrationNumber(new Cpf('904.554.270-62'));
$registration->setDateOfRegistration(new \DateTime());
$registration->setRegistrationAt(new \DateTime());

$input = new InputBoundary(new Cpf('904.554.270-62'));
$exportRegistration = new ExportRegistration(LoadRegistrationRepository::class);
$output = $exportRegistration->handle($input);

print_r($output);