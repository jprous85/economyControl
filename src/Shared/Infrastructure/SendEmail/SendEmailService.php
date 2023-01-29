<?php

declare(strict_types=1);


namespace Src\Shared\Infrastructure\SendEmail;


use App\Jobs\SendJobEmail;
use Src\Shared\Application\SendEmail\SendEmailDTO;
use Src\Shared\Domain\Repositories\SendEmailRepository;

final class SendEmailService implements SendEmailRepository
{

    public function send(SendEmailDTO $sendEmailDTO)
    {
        SendJobEmail::dispatch($sendEmailDTO);
    }
}
