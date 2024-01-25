<?php

namespace CsvWriter\HeaderTransformer;

class CsvHeaderTransformer implements CsvHeaderTransformerInterface
{
    public function __construct(array $rules = [])
    {
        $this->rules = $rules;
    }

    public function transform(array $rowData): string
    {
        $columnSeparator = ', ';
        $columns = array();
        $columnsCount = count($rowData);
        $lastKey = array_key_last($rowData);

        foreach($rowData as $key => $value) {
            $newValue = ucfirst(str_replace('_', ' ', $key));

            if($key != $lastKey) {
                $newValue = $newValue . $columnSeparator;
            }

            if(count($this->rules)) {
                foreach($this->rules as $rule) {
                    $newValue = $rule->apply([
                        $key => $newValue
                    ]);
                }
            }

            $columns[$key] = $newValue;
        }

        return implode('', $columns);
    }
}
