<?php

namespace Src\Shared\Domain\Repositories;

use Src\Shared\Application\SendEmail\SendEmailDTO;

interface SendEmailRepository
{
    public function send(SendEmailDTO $sendEmailDTO);
}
