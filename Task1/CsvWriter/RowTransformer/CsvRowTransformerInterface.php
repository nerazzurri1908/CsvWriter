<?php

namespace CsvWriter\RowTransformer;

interface CsvRowTransformerInterface
{
    public function transform($rowData): string;
}
