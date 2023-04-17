<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Src\Shared\Application\SendEmail\SendEmailDTO;

class SendJobEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private const FROM = 'programandoconcabeza@gmail.com';

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private SendEmailDTO $sendEmailDTO)
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        App::setLocale($this->sendEmailDTO->getLanguage());

        Mail::send(
            $this->sendEmailDTO->getTemplate(),
            $this->sendEmailDTO->getParams(),
            function ($message) {
                $message->to($this->sendEmailDTO->getTo());
                $message->from(self::FROM);
                $message->sender(self::FROM);

                if ($this->sendEmailDTO->getCc() && env('APP_ENV') == 'production') {
                    $message->cc($this->sendEmailDTO->getCc());
                }

                if ($this->sendEmailDTO->getBcc() && env('APP_ENV') == 'production') {
                    $message->cc($this->sendEmailDTO->getBcc());
                }

                $message->subject(trans($this->sendEmailDTO->getSubject()));
            }
        );
    }
}
