<?php

namespace Profession\JobBundle\Service;

use Profession\JobBundle\Entity\Job;

/**
 * JobMailerService
 */
class JobMailerService 
{
    const BODY_TYPE          = 'text/html';
    const SENDER_EMAIL       = 'no-reply@profession.hu';
    const ACTIVATION_SUBJECT = 'Job activation';

    private $mailer;

    /**
     * @param MailHandler $mailer
     */
    public function __construct(\Swift_Mailer $mailer) 
    {
        $this->mailer = $mailer;
    }

    /**
     * Send activation email
     * 
     * @param Job $job
     * @param string $body
     */
    public function sendActivationMail(Job $job, $body) 
    {
        $message = $this->createMessage()
            ->setSubject(self::ACTIVATION_SUBJECT)
            ->setTo($job->getSellerEmail())
            ->setBody(
                $body, 
                self::BODY_TYPE
            );

        $this->mailer->send($message);
    }

    /**
     * Create new Swift_Message
     * 
     * @return Swift_Message $message
     */
    private function createMessage()
    {
         return \Swift_Message::newInstance()
            ->setFrom(self::SENDER_EMAIL);
    }
}
