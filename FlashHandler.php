<?php

namespace XM\FlashBundle;

interface FlashHandler
{
    /**
     * Adds a flash message to the current session for type.
     *
     * @param string $type    The type
     * @param string $message The message
     */
    public function add($type, $message);
}