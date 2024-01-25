<?php

namespace CsvWriter\HeaderTransformer\TransformRules;

class RenameColumnRule implements TransformRuleInterface
{
    public function __construct(string $keyName, string $newName)
    {
        $this->keyName = $keyName;
        $this->newName = $newName;
    }

    public function apply($data): string
    {
        $key = array_key_first($data);

        if($key == $this->keyName) {
            return $this->newName;
        }

        return $data[$key];
    }
}
