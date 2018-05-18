<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormInput extends Model
{
    private $_name = null;
    private $_type = null;
    private $_class = null;
    private $_identity = null;
    private $_placeholder = null;
    private $_input_attribute = null;
    private $_default_input_value = null;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param string $name
     */
    public function setName($name): void
    {
        $this->_name = $name;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @param string $type
     */
    public function setType($type): void
    {
        $this->_type = $type;
    }

    /**
     * @return string
     */
    public function getClass()
    {
        return $this->_class;
    }

    /**
     * @param string $class
     */
    public function setClass($class): void
    {
        $this->_class = $class;
    }

    /**
     * @return string
     */
    public function getIdentity()
    {
        return $this->_identity;
    }

    /**
     * @param string $identity
     */
    public function setIdentity($identity): void
    {
        $this->_identity = $identity;
    }

    /**
     * @return string
     */
    public function getInputAttribute()
    {
        return $this->_input_attribute;
    }

    /**
     * @param string $attribute
     */
    public function setInputAttribute($attribute): void
    {
        $this->_input_attribute = $attribute;
    }

    /**
     * @return string
     */
    public function getPlaceholder()
    {
        return $this->_placeholder;
    }

    /**
     * @param string $placeholder
     */
    public function setPlaceholder($placeholder): void
    {
        $this->_placeholder = $placeholder;
    }

    /**
     * @return string
     */
    public function getDefaultInputValue()
    {
        return $this->_default_input_value;
    }

    /**
     * @param string $default_input_value
     */
    public function setDefaultInputValue($default_input_value): void
    {
        $this->_default_input_value = $default_input_value;
    }
}
