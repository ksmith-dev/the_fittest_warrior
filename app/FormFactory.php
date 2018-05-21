<?php

namespace App;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

class FormFactory extends Model
{
    private $_table = null;
    private $_class = array();
    private $_attribute = null;
    private $_inputs = array();
    private $_options = array();
    private $_protected = array();
    private $_label_override = array();
    private $_input_override = array();
    private $_default_input_value = array();

    /**
     * FormFactory constructor.
     * @param string $table
     */
    public function __construct(string $table)
    {
        $this->_table = $table;
    }

    /**
     * @param string $column
     * @return string
     */
    public function getDefaultInputValue(string $column): string
    {
        return $this->_default_input_value[$column];
    }

    /**
     * @param string $column
     * @param string $default_input_value
     */
    public function setDefaultInputValue(string $column, string $default_input_value): void
    {
        $this->_default_input_value[$column] = $default_input_value;
    }

    /**
     * @param string $column
     * @return string
     */
    public function getInputAttribute(string $column) : string
    {
        return $this->_attribute[$column];
    }

    /**
     * @param string $column
     * @param string $attribute
     */
    public function setInputAttribute(string $column, string $attribute): void
    {
        empty($this->_attribute[$column]) ? $this->_attribute[$column] = $attribute : $this->_attribute[$column] = $this->_attribute[$column] . ' ' . $attribute;
    }

    /**
     * @return null|string
     */
    public function getTableName()
    {
        return $this->_table;
    }

    public function getInputs()
    {
        return $this->_inputs;
    }

    public function createFormInputs()
    {
        $columns = Schema::getColumnListing($this->_table);

        foreach ($columns as $column)
        {
            if (!in_array($column, $this->_protected))
            {
                if (!empty($this->_input_override[$column]))
                {
                    switch ($this->_input_override[$column])
                    {
                        case 'checkbox' :
                            //TODO - create this function
                            break;
                        case 'color' :
                            //TODO - create this function
                            break;
                        case 'date' :
                            $this->addDateInput($column);
                            break;
                        case 'datetime-local' :
                            //TODO - create this function
                            break;
                        case 'email' :
                            //TODO - create this function
                            break;
                        case 'file' :
                            //TODO - create this function
                            break;
                        case 'month' :
                            //TODO - create this function
                            break;
                        case 'number' :
                            $this->addNumberInput($column);
                            break;
                        case 'password' :
                            //TODO - create this function
                            break;
                        case 'radio' :
                            //TODO - create this function
                            break;
                        case 'range' :
                            //TODO - create this function
                            break;
                        case 'select' :
                            $this->addSelectInput($column);
                            break;
                        case 'tel' :
                            //TODO - create this function
                            break;
                        case 'time' :
                            $this->addTimeInput($column);
                            break;
                        case 'url' :
                            //TODO - create this function
                            break;
                        case 'week' :
                            //TODO - create this function
                            break;
                        default :
                            $this->addTextInput($column);
                            break;
                    }
                } else {
                    $this->addTextInput($column);
                }
            }
        }
    }

    /**
     * @param string $column
     * @return bool
     */
    public function isProtected(string $column) : bool
    {
        return in_array($column, $this->_protected);
    }

    /**
     * @param string $column
     */
    public function addProtectedColumn(string $column): void
    {
        array_push($this->_protected, $column);
    }

    /**
     * @param array $columns
     */
    public function setProtectedColumns(array $columns): void
    {
        $this->_protected = $columns;
    }

    /**
     * @param string $column
     * @param array $options
     */
    public function setOptions(string $column, array $options): void
    {
        $this->_options[$column] = $options;
    }

    /**
     * @param string $column
     * @param string $option
     */
    public function addOption(string $column, string $option) : void
    {
        array_push($this->_protected[$column], $option);
    }

    /**
     * @param string $column
     * @return string
     */
    public function getLabelOverride(string $column) : string
    {
        return $this->_label_override[$column];
    }

    /**
     * @param string $column
     * @param string $override
     */
    public function addLabelOverride(string $column, string $override): void
    {
        $this->_label_override[$column] = $override;
    }

    /**
     * @param array $overrides
     */
    public function setLabelOverrides(array $overrides): void
    {
        $this->_label_override = $overrides;
    }

    /**
     * @param string $column
     * @return string
     */
    public function getInputOverride(string $column) : string
    {
        return $this->_input_override[$column];
    }

    /**
     * @param string $column
     * @param string $override
     */
    public function addInputOverride(string $column, string $override): void
    {
        empty($this->_input_override[$column]) ? $this->_input_override[$column] = $override : array_push($this->_input_override[$column], $override);
    }

    /**
     * @param array $overrides
     */
    public function setInputOverrides(array $overrides): void
    {
        $this->_input_override = $overrides;
    }

    /**
     * @param string $input_type
     * @return string
     */
    public function getClass(string $input_type) : string
    {
        return $this->_class[$input_type];
    }

    /**
     * @param string $input_type
     * @param string $class
     */
    public function setClass(string $input_type, string $class): void
    {
        $this->_class[$input_type] = $class;
    }

    /**
     * @param string $input_type
     * @param string $column
     * @return string | null
     */
    public function getClassOverride(string $input_type, string $column): string
    {
        if(empty($this->_class['override'][$column][$input_type])) { return null; } else { return $this->_class['override'][$column][$input_type]; }
    }

    /**
     * @param string $column
     * @param string $input_type
     * @param string $class
     */
    public function setClassOverride(string $column, string $input_type, string $class): void
    {
        $this->_class['override'][$column][$input_type] = $class;
    }

    /*------------------------ ADD INPUT FUNCTIONS BELOW ------------------------*/
    private function addNumberInput(string $column)
    {
        $this->addLabel($column);
        $this->addInput($column, 'number', $column);
    }

    private function addDateInput($column)
    {
        $this->addLabel($column);
        $this->addInput($column, 'date');
    }

    private function addTextInput(string $column)
    {
        $this->addLabel($column);
        $this->addInput($column, 'text', $column);
    }

    /**
     * @param string $column
     */
    private function addTimeInput(string $column)
    {
        $this->addLabel($column);
        $this->addInput($column, 'time');
    }

    private function addSelectInput(string $column)
    {
        $this->addLabel($column);

        $select = new FormSelect();
        $select->setId($column);
        $select->setName($column);
        if (!empty($this->_class['select'])) { empty($this->_class['override'][$column]['select']) ? $select->setClass($this->_class['select']) : $select->setClass($this->_class['override'][$column]['select']); }
        $select->setOptions($this->_options[$column]);

        $this->_inputs[$column]['select'] = $select;
    }

    private function addLabel(string $column)
    {
        $label = new FormLabel();
        $label->setFor($column);
        if (!empty($this->_class['label'])) { empty($this->_class['override'][$column]['label']) ? $label->setClass($this->_class['label']) : $label->setClass($this->_class['override'][$column]['label']); }
        empty($this->_label_override[$column]) ? $label->setValue($column) : $label->setValue($this->_label_override[$column]);

        $this->_inputs[$column]['label'] = $label;
    }

    private function addInput(string $column, string $type, string $placeholder = null)
    {
        $input = new FormInput();
        $input->setType($type);
        $input->setName($column);
        $input->setIdentity($column);
        empty($placeholder) ? $input->setPlaceholder(null) : $input->setPlaceholder('Enter ' . ucwords(str_replace('_', ' ', $placeholder)));
        if (!empty($this->_class['input'])) { empty($this->_class['override'][$column]['input']) ? $input->setClass($this->_class['input']) : $input->setClass($this->_class['override'][$column]['input']); }
        empty($this->_attribute[$column]) ? : $input->setInputAttribute($this->_attribute[$column]);
        empty($this->_default_input_value[$column]) ? : $input->setDefaultInputValue($this->_default_input_value[$column]);

        $this->_inputs[$column]['input'] = $input;
    }
}
