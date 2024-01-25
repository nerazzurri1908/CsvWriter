<?php

namespace CsvWriter\HeaderTransformer\TransformRules;

interface TransformRuleInterface
{
    public function apply($data): string;
}
