<?php
final class Email
{
    private $from;
    private $to;
    private $cc;
    private $subject;
    private $body;

    /**
     * @param string[] $from
     * @param string[] $to
     * @param string[] $cc
     */
    public function __construct(
        array $from,
        array $to,
        array $cc,
        string $subject,
        string $body
    ) {
        $this->from = $from;
        $this->to = $to;
        $this->cc = $cc;
        $this->subject = $subject;
        $this->body = $body;
    }
}
