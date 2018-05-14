<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormColumns extends Model
{
    private $_form = array();

    /**
     * @param FormLabel $label
     */
    public function addFormLabel(FormLabel $label) : void
    {
        if (!empty($this->_form[$label->getFor()]))
        {
            $this->_form[$label->getFor()]['label'] = $label;
        } else {
            $this->_form[$label->getFor()] = array('label' => $label);
        }
    }

    /**
     * @param FormInput $input
     */
    public function addFormInput(FormInput $input) : void
    {
        if (!empty($this->_form[$input->getName()]))
        {
            $this->_form[$input->getName()]['input'] = $input;
        } else {
            $this->_form[$input->getName()] = array('input' => $input);
        }
    }

    public function addFormSelect(FormSelect $select)
    {
        if (!empty($this->_form[$select->getName()]))
        {
            $this->_form[$select->getName()]['select'] = $select;
        } else {
            $this->_form[$select->getName()] = array('select' => $select);
        }
    }

    public function getFormColumns()
    {
        return $this->_form;
    }
}
