<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormSelect extends Model
{
    private $_id = null;
    private $_name = null;
    private $_options = null;
    private $_class = null;

    /**
     * @return null
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param null $id
     */
    public function setId($id): void
    {
        $this->_id = $id;
    }

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
     * @return array
     */
    public function getOptions(): array
    {
        return $this->_options;
    }

    /**
     * @param array $options
     */
    public function setOptions(array $options): void
    {
        foreach ($options as $key => $value)
        {
            $this->_options[$key] = $value;
        }
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
