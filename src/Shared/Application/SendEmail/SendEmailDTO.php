<?php

declare(strict_types=1);


namespace Src\Shared\Application\SendEmail;


final class SendEmailDTO
{
    public function __construct(
        private string $from,
        private string $to,
        private ?string $cc,
        private ?string $bcc,
        private string $subject,
        private string $template
    )
    {
    }

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @return string|null
     */
    public function getCc(): ?string
    {
        return $this->cc;
    }

    /**
     * @return string|null
     */
    public function getBcc(): ?string
    {
        return $this->bcc;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->template;
    }
}
