<?php

namespace Vgplay\MiniGame\Exceptions;

use Exception;

class EmptyPoolException extends Exception
{
    public function __construct($message = 'Chưa thiết lập tỉ lệ.')
    {
        parent::__construct($message);
    }
}
