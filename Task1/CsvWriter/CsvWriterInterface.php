<?php

namespace CsvWriter;

interface CsvWriterInterface
{
    public function save(string $filePath, array $rows, bool $append = true);
}
