<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormMap extends Model
{
    private $_input_map = array
    (
        'input' => array(),
        'label' => array()
    );

    /**
     * @return array
     */
    public function getFormMap(): array
    {
        return $this->_input_map;
    }


    /**
     * @param string $element_type
     * @param string $name
     * @param string $value
     * @param string $type
     * @param string|null $classes
     * @param string|null $identity
     * @param string|null $placeholder
     * @param string|null $attributes
     */
    public function setFormMap(string $element_type, string $name, string $value, string $type, string $classes = null, string $identity = null, string $placeholder = null, string $attributes = null) {
        $this->_input_map['input']['element_type'] = $element_type;
        $this->_input_map['input']['name'] = $name;
        $this->_input_map['input']['value'] = $value;
        $this->_input_map['input']['type'] = $type;
        $this->_input_map['input']['class'] = $classes;
        $this->_input_map['input']['identity'] = $identity;
        $this->_input_map['input']['attributes'] = $attributes;
        $this->_input_map['input']['placeholder'] = $placeholder;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->_input_map['input']['name'] = $name;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value)
    {
        $this->_input_map['input']['value'] = $value;
    }

    /**
     * @param $type
     */
    public function setType($type)
    {
        $this->_input_map['input']['type'] = $type;
    }

    public function setClass(string $class)
    {
        $this->_input_map['input']['class'] = $class;
    }
}
