<?php

namespace App;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

class FormFactory extends Model
{
    private $_inputs = array();
    private $_table = null;
    private $_input_structure = null;

    /**
     * FormFactory constructor.
     * @param string $table
     * @param array|null $input_structure
     */
    public function __construct(string $table, array $input_structure = null)
    {
        $this->_table = $table;
        $this->_input_structure = $input_structure;
    }

    public function getInputs()
    {
        return $this->_inputs;
    }

    public function createFormInputs()
    {
        $columns = Schema::getColumnListing($this->_table);

        if (empty($this->_input_structure))
        {
            $columns_and_types = null;

            foreach ($columns as $column)
            {
                $columns_and_types[$column] = Schema::getColumnType('user', $column);
            }

            foreach ($columns_and_types as $column => $type)
            {
                switch ($type)
                {
                    case ('date' || 'datetime' || 'timestamp' || 'time' || 'year') :
                        //TODO - add this function
                        break;
                    case ('integer' || 'int' || 'smallint' || 'tiny_int' || 'mediumint' || 'bigint' || 'decimal' || 'float' || 'bit') :
                        $this->addIntegerInput($column);
                        break;
                    case ('char' || 'varchar' || 'blob' || 'text' || 'binary' || 'varbinary' || 'enum' || 'set') :
                        //TODO - add this function
                        break;
                        //TODO - add more data type cases to cover all possible data types
                    default :
                        //TODO - add this function
                        break;
                }
            }
        } else {

            foreach ($columns as $column)
            {
                if (!in_array($column, $this->_input_structure['protected']))
                {
                    if (!empty($this->_input_structure['override_type'][$column]))
                    {
                        switch ($this->_input_structure['override_type'][$column])
                        {
                            case 'checkbox' :
                                //TODO - create this function
                                break;
                            case 'color' :
                                //TODO - create this function
                                break;
                            case 'date' :
                                //TODO - create this function
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
                                //TODO - create this function
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
                                //TODO - create this function
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
    }

    private function addIntegerInput(string $column)
    {
        $this->addLabel($column);
        $this->addInput($column, 'number');
    }

    private function addTextInput(string $column)
    {
        $this->addLabel($column);
        $this->addInput($column, 'text');
    }

    private function addSelectInput(string $column)
    {
        $this->addLabel($column);

        $select = new FormSelect();
        $select->setId($column);
        $select->setName($column);
        $select->setClass($this->_input_structure['class']['select']);
        $select->setOptions($this->_input_structure['options'][$column]);

        $this->_inputs[$column]['select'] = $select;
    }

    private function addLabel(string $column)
    {
        $label = new FormLabel();
        $label->setFor($column);
        $label->setClass($this->_input_structure['class']['label']);
        empty($this->_input_structure['override_label'][$column]) ? $label->setValue($column) : $label->setValue($this->_input_structure['override_label'][$column]);

        $this->_inputs[$column]['label'] = $label;
    }

    private function addInput(string $column, string $type)
    {
        $input = new FormInput();
        $input->setType($type);
        $input->setName($column);
        $input->setIdentity($column);
        $input->setPlaceholder('Enter ' . ucwords(str_replace('_', ' ', $column)));
        $input->setClass($this->_input_structure['class']['input']);

        $this->_inputs[$column]['input'] = $input;
    }

}
