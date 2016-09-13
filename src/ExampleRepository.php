<?php

namespace Delta\DeltaService;

use Delta\DeltaService\Example\ExampleModel;
use Delta\DeltaService\Example\AbstractRepository;
use Delta\DeltaService\Example\ExampleRepositoryInterface;

class ExampleRepository extends AbstractRepository implements ExampleRepositoryInterface
{
    protected $model = ExampleModel::class;
}