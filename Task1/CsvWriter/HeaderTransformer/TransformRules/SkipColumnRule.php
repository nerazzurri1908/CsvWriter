<?php

namespace CsvWriter\HeaderTransformer\TransformRules;

class SkipColumnRule implements TransformRuleInterface
{
    public function __construct(string $keyName)
    {
        $this->keyName = $keyName;
    }

    public function apply($data): string
    {
        $key = array_key_first($data);

        if($key == $this->keyName) {
            return '';
        }

        return $data[$key];
    }
}
