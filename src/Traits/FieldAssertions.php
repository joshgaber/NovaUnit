<?php

namespace JoshGaber\NovaUnit\Traits;

use Illuminate\Http\Request;
use JoshGaber\NovaUnit\Constraints\HasField;
use JoshGaber\NovaUnit\Constraints\HasValidFields;
use JoshGaber\NovaUnit\Fields\FieldHelper;
use JoshGaber\NovaUnit\Fields\FieldNotFoundException;
use JoshGaber\NovaUnit\Fields\MockFieldElement;
use JoshGaber\NovaUnit\Lenses\MockLens;
use JoshGaber\NovaUnit\Resources\MockResource;
use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Framework\Constraint\IsType;

trait FieldAssertions
{
    /**
     * Checks that this Nova component has a field with the same name or attribute.
     *
     * @param string $field The name or attribute of the field
     * @param string $message
     * @return $this
     */
    public function assertHasField(string $field, string $message = ''): self
    {
        PHPUnit::assertThat(
            $this->component->fields(Request::createFromGlobals()),
            new HasField($field, $this->allowPanels()),
            $message
        );

        return $this;
    }

    /**
     * Checks that no field on this Nova component has a name or attribute matching
     * the given parameter.
     *
     * @param string $field
     * @param string $message
     * @return $this
     */
    public function assertFieldMissing(string $field, string $message = ''): self
    {
        PHPUnit::assertThat(
            $this->component->fields(Request::createFromGlobals()),
            PHPUnit::logicalNot(new HasField($field, $this->allowPanels())),
            $message
        );

        return $this;
    }

    /**
     * Asserts that this Nova Action has no fields defined.
     * @param string $message
     * @return $this
     */
    public function assertHasNoFields(string $message = ''): self
    {
        PHPUnit::assertCount(0, $this->component->fields(Request::createFromGlobals()), $message);

        return $this;
    }

    /**
     * Asserts that all fields defined on this Nova Action are valid fields.
     *
     * @param string $message
     * @return $this
     */
    public function assertHasValidFields(string $message = ''): self
    {
        PHPUnit::assertThat(
            $this->component->fields(Request::createFromGlobals()),
            PHPUnit::logicalAnd(
                new IsType(IsType::TYPE_ARRAY),
                new HasValidFields($this->allowPanels())
            ),
            $message
        );

        return $this;
    }

    /**
     * Searches for a matching field instance on this component for testing.
     *
     * @param string $fieldName The name or attribute of the field to return
     * @return MockFieldElement
     * @throws FieldNotFoundException
     */
    public function field(string $fieldName): MockFieldElement
    {
        $field = FieldHelper::findField(
            $this->component->fields(Request::createFromGlobals()),
            $fieldName,
            $this->allowPanels()
        );

        if (is_null($field)) {
            throw new FieldNotFoundException();
        }

        return new MockFieldElement($field);
    }

    private function allowPanels(): bool
    {
        return $this instanceof MockLens || $this instanceof MockResource;
    }
}
