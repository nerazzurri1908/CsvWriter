<?php

namespace CsvWriter\HeaderTransformer;

interface CsvHeaderTransformerInterface
{
    public function transform(array $rowData): string;
}
