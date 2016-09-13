<?php

namespace Delta\DeltaService\Example;

use Delta\DeltaService\Example\ExampleModel;
use Delta\DeltaService\AbstractRepository;
use Delta\DeltaService\Example\ExampleRepositoryInterface;

class ExampleRepository extends AbstractRepository implements ExampleRepositoryInterface
{
    protected $model = ExampleModel::class;
}