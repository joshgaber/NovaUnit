<?php

namespace JoshGaber\NovaUnit\Constraints;

use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Constraint\Constraint;
use ReflectionClass;

class EloquentCollectionContains extends Constraint
{
    /**
     * @var Model
     */
    private $object;

    public function __construct($object)
    {
        $this->object = $object;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(): string
    {
        return \sprintf('contains the given %s', (new ReflectionClass($this->object))->getShortName());
    }

    public function matches($collection): bool
    {
        return $collection->find($this->object->getKey()) instanceof Model;
    }
}
