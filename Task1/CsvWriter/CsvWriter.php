<?php

namespace CsvWriter;

use CsvWriter\HeaderTransformer\CsvHeaderTransformerInterface;
use CsvWriter\RowTransformer\CsvRowTransformerInterface;

class CsvWriter implements CsvWriterInterface
{
    public function __construct(
        CsvHeaderTransformerInterface $headerTransformer,
        CsvRowTransformerInterface $rowTransformer
    ) {
        $this->headerTransformer = $headerTransformer;
        $this->rowTransformer = $rowTransformer;
    }

    public function save(string $filePath, $rows, bool $append = true)
    {
        if(!count($rows)) {
            return;
        }

        $fileMode = $append ? CsvOpenFileModeEnum::APPEND : CsvOpenFileModeEnum::CREATE;
        $fp = fopen($filePath, $fileMode);

        try {
            if($this->withHeader($append)) {
                $this->writeToFile($fp, $this->prepareHeaders($rows[0]));
            }

            foreach ($rows as $row) {
                $this->writeToFile($fp, $this->prepareRow($row));
            }
        } catch(\Exception $ex) {
            fclose($fp);

            throw new \Exception($ex->getMessage());
        }
    }

    private function withHeader(bool $appendMode)
    {
        if($appendMode) {
            return false;
        }
        return true;
    }

    private function prepareHeaders($rowData)
    {
        return $this->headerTransformer->transform($rowData);
    }

    private function prepareRow($rowData)
    {
        return $this->rowTransformer->transform($rowData);
    }

    private function writeToFile($fp, string $row)
    {
        fwrite($fp, $row. PHP_EOL);
    }
}
