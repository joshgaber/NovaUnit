<?php

namespace JoshGaber\NovaUnit\Fields;

use Laravel\Nova\Fields\Field;
use PHPUnit\Framework\Assert as PHPUnit;

class MockFieldElement
{
    private $field;

    public function __construct(Field $field)
    {
        $this->field = $field;
    }

    /**
     * Assert that the following rule can be found on the field.
     *
     * @param string $rule The rule to match this field against
     * @param string $message
     * @return $this
     */
    public function assertHasRule(string $rule, string $message = ''): self
    {
        PHPUnit::assertContains($rule, $this->field->rules, $message);

        return $this;
    }

    /**
     * Assert that the following rule cannot be found on the field.
     *
     * @param string $rule The rule to match this field against
     * @param string $message
     * @return $this
     */
    public function assertRuleMissing(string $rule, string $message = ''): self
    {
        PHPUnit::assertNotContains($rule, $this->field->rules, $message);

        return $this;
    }

    /**
     * Assert that the field can be shown on the index view.
     *
     * @param string $message
     * @return $this
     */
    public function assertShownOnIndex(string $message = ''): self
    {
        $test = $this->field->showOnIndex;
        PHPUnit::assertTrue(
            is_callable($test) ? $test() : $test,
            $message
        );

        return $this;
    }

    /**
     * Assert that the field is hidden from the index view.
     *
     * @param string $message
     * @return $this
     */
    public function assertHiddenFromIndex(string $message = ''): self
    {
        $test = $this->field->showOnIndex;
        PHPUnit::assertFalse(
            is_callable($test) ? $test() : $test,
            $message
        );

        return $this;
    }

    /**
     * Assert that the field can be shown on the detail view.
     *
     * @param string $message
     * @return $this
     */
    public function assertShownOnDetail(string $message = ''): self
    {
        $test = $this->field->showOnDetail;
        PHPUnit::assertTrue(
            is_callable($test) ? $test() : $test,
            $message
        );

        return $this;
    }

    /**
     * Assert that the field is hidden from the detail view.
     *
     * @param string $message
     * @return $this
     */
    public function assertHiddenFromDetail(string $message = ''): self
    {
        $test = $this->field->showOnDetail;
        PHPUnit::assertFalse(
            is_callable($test) ? $test() : $test,
            $message
        );

        return $this;
    }

    /**
     * Assert that the field can be shown when creating a new record.
     *
     * @param string $message
     * @return $this
     */
    public function assertShownWhenCreating(string $message = ''): self
    {
        $test = $this->field->showOnCreation;
        PHPUnit::assertTrue(
            is_callable($test) ? $test() : $test,
            $message
        );

        return $this;
    }

    /**
     * Assert that the field is hidden when creating a new record.
     *
     * @param string $message
     * @return $this
     */
    public function assertHiddenWhenCreating(string $message = ''): self
    {
        $test = $this->field->showOnCreation;
        PHPUnit::assertFalse(
            is_callable($test) ? $test() : $test,
            $message
        );

        return $this;
    }

    /**
     * Assert that the field can be shown when updating a record.
     *
     * @param string $message
     * @return $this
     */
    public function assertShownWhenUpdating(string $message = ''): self
    {
        $test = $this->field->showOnUpdate;
        PHPUnit::assertTrue(
            is_callable($test) ? $test() : $test,
            $message
        );

        return $this;
    }

    /**
     * Assert that the field is hidden when updating a record.
     *
     * @param string $message
     * @return $this
     */
    public function assertHiddenWhenUpdating(string $message = ''): self
    {
        $test = $this->field->showOnUpdate;
        PHPUnit::assertFalse(
            is_callable($test) ? $test() : $test,
            $message
        );

        return $this;
    }

    /**
     * Assert that the field should be set to null if the value is empty.
     *
     * @param string $message
     * @return $this
     */
    public function assertNullable(string $message = ''): self
    {
        PHPUnit::assertTrue($this->field->nullable, $message);

        return $this;
    }

    /**
     * Assert that the field should not be set to null if the value is empty.
     *
     * @param string $message
     * @return $this
     */
    public function assertNotNullable(string $message = ''): self
    {
        PHPUnit::assertFalse($this->field->nullable, $message);

        return $this;
    }

    /**
     * Assert that records can be sorted by this field.
     *
     * @param string $message
     * @return $this
     */
    public function assertSortable(string $message = ''): self
    {
        PHPUnit::assertTrue($this->field->sortable, $message);

        return $this;
    }

    /**
     * Assert that records cannot be sorted by this field.
     *
     * @param string $message
     * @return $this
     */
    public function assertNotSortable(string $message = ''): self
    {
        PHPUnit::assertFalse($this->field->sortable, $message);

        return $this;
    }
}
