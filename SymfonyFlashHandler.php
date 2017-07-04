<?php

namespace XM\FlashBundle;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Translation\TranslatorInterface;

class SymfonyFlashHandler implements FlashHandler
{
    private $session;
    private $translator;

    public function __construct(Session $session, TranslatorInterface $translator)
    {
        $this->session = $session;
        $this->translator = $translator;
    }

    /**
     * {@inheritdoc}
     */
    public function add($type, $message)
    {
        $this->session->getFlashBag()->add($type, $this->trans($message));

        return $this;
    }

    /**
     * Translates the message with the params.
     *
     * @param       $message
     * @param array $params
     * @return string
     */
    protected function trans($message, array $params = [])
    {
        return $this->translator->trans($message, $params);
    }
}