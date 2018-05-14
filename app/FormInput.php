<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormInput extends Model
{
    private $_name = null;
    private $_value = null;
    private $_type = null;
    private $_class = null;
    private $_identity = null;
    private $_input_attribute = null;
    private $_placeholder = null;

    /**
     * @return null
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param null $name
     */
    public function setName($name): void
    {
        $this->_name = $name;
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
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @param null $type
     */
    public function setType($type): void
    {
        $this->_type = $type;
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

    /**
     * @return null
     */
    public function getIdentity()
    {
        return $this->_identity;
    }

    /**
     * @param null $identity
     */
    public function setIdentity($identity): void
    {
        $this->_identity = $identity;
    }

    /**
     * @return null
     */
    public function getInputAttribute()
    {
        return $this->_input_attribute;
    }

    /**
     * @param null $attribute
     */
    public function setInputAttribute($attribute): void
    {
        $this->_input_attribute = $attribute;
    }

    /**
     * @return null
     */
    public function getPlaceholder()
    {
        return $this->_placeholder;
    }

    /**
     * @param null $placeholder
     */
    public function setPlaceholder($placeholder): void
    {
        $this->_placeholder = $placeholder;
    }
}
