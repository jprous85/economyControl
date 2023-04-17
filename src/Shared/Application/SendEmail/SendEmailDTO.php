<?php

declare(strict_types=1);


namespace Src\Shared\Application\SendEmail;


final class SendEmailDTO
{
    public function __construct(
        private string $to,
        private ?string $cc = null,
        private ?string $bcc = null,
        private string $subject,
        private string $template,
        private string $language = 'en',
        private ?array $params = null
    )
    {

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
    public function getLanguage(): string
    {
        return $this->language;
    }


    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->template;
    }

    /**
     * @return array|null
     */
    public function getParams(): ?array
    {
        return $this->params;
    }
}
