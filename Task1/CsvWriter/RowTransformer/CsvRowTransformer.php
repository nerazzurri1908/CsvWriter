<?php

namespace CsvWriter\RowTransformer;

class CsvRowTransformer implements CsvRowTransformerInterface
{
    public function transform($rowData): string
    {
        $columns = array();

        foreach($rowData as $key => $value) {
            array_push($columns, $value);
        }

        return implode(',', $columns);
    }
}
