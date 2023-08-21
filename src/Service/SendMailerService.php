<?php

namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class SendMailerService
{
    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }


    public function send(
        string $from,
        string $to,
        string $subject,
        string $message
    ) {
        $email = (new Email())
            ->from(filter_var($from, FILTER_VALIDATE_EMAIL))
            ->to($to)
            ->subject($subject)
            ->text($message);

        $this->mailer->send($email);
    }
}
