<?php

namespace CsvWriter\HeaderTransformer\TransformRules;

class RemoveRightSpaceRule implements TransformRuleInterface
{
    public function __construct(string $keyName)
    {
        $this->keyName = $keyName;
    }

    public function apply($data): string
    {
        $key = array_key_first($data);

        if($key == $this->keyName) {
            return rtrim($data[$key]);
        }

        return $data[$key];
    }
}
