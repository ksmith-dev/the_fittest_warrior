<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormLabel extends Model
{
    private $_for = null;
    private $_value = null;
    private $_class = null;

    /**
     * @return null
     */
    public function getFor()
    {
        return $this->_for;
    }

    /**
     * @param null $for
     */
    public function setFor($for): void
    {
        $this->_for = $for;
    }

    /**
     * @return null
     */
    public function getValue()
    {
        return $this->_value;
    }

    /**
     * @param null $value
     */
    public function setValue($value): void
    {
        $this->_value = $value;
    }

    /**
     * @return null
     */
    public function getClass()
    {
        return $this->_class;
    }

    /**
     * @param null $class
     */
    public function setClass($class): void
    {
        $this->_class = $class;
    }
}
