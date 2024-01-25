<?php

include "spl_autoload_register.php";

use CsvWriter\HeaderTransformer\TransformRules\SkipColumnRule;
use CsvWriter\HeaderTransformer\TransformRules\RenameColumnRule;
use CsvWriter\HeaderTransformer\TransformRules\RemoveRightSpaceRule;
use CsvWriter\HeaderTransformer\CsvHeaderTransformer;
use CsvWriter\RowTransformer\CsvRowTransformer;
use CsvWriter\CsvWriter;

$data = [
    [
    'country_name' => 'USA',
    'country_code' => 'US',
    'city_name' => 'New York',
    'lat' => '40.7127753',
    'lng' => '-74.0059728',
    ],
    [
    'country_name' => 'USA',
    'country_code' => 'US',
    'city_name' => 'Los Angeles',
    'lat' => '34.0522342',
    'lng' => '-118.2436849',
    ],
    [
    'country_name' => 'Philippines',
    'country_code' => 'PH',
    'city_name' => 'Manila',
    'lat' => '14.5995124',
    'lng' => '120.9842195',
    ],
    [
    'country_name' => 'Philippines',
    'country_code' => 'PH',
    'city_name' => 'Cebu',
    'lat' => '10.3156993',
    'lng' => '123.8854377',
    ]
];


$transformRules = array(
    new SkipColumnRule('city_name'),
    new RenameColumnRule('lng', 'Long'),
    new RemoveRightSpaceRule('country_code')
);
$csv = new CsvWriter(
    new CsvHeaderTransformer($transformRules),
    new CsvRowTransformer()
);
$csv->save('file.csv', $data, false);
