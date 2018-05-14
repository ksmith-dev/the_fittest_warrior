<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    private $_message = null;
    private $_state = null;

    /**
     * @return null
     */
    public function getMessage()
    {
        return $this->_message;
    }

    /**
     * @param null $message
     */
    public function setMessage($message): void
    {
        $this->_message = $message;
    }

    /**
     * @return null
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @param null $state
     */
    public function setState($state): void
    {
        $this->_state = $state;
    }
}
