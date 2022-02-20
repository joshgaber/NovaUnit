<?php

namespace JoshGaber\NovaUnit\Fields;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Panel;

class FieldHelper
{
    /**
     * Finds the first field with a name or attribute matching the given name.
     *
     * @param  array  $fields  The list of fields to search
     * @param  string  $fieldName  The name or attribute of the field to match
     * @param  bool  $allowPanels  Whether fields inside panels should also be searched
     * @return Field|null The first matching field if found, or null if not
     */
    public static function findField(array $fields, string $fieldName, bool $allowPanels = false): ?Field
    {
        foreach ($fields as $field) {
            if ($allowPanels && $field instanceof Panel) {
                $panelField = self::findField($field->data, $fieldName, $allowPanels);
                if ($panelField instanceof Field) {
                    return $panelField;
                }
            } elseif (self::fieldMatches($field, $fieldName)) {
                return $field;
            }
        }

        return null;
    }

    /**
     * Determines whether the given field has a name or attribute matching the provided field name.
     *
     * @param  mixed  $field  The field
     * @param  string  $fieldName  the field name or attribute to match
     * @return bool
     */
    public static function fieldMatches($field, string $fieldName): bool
    {
        return $field instanceof Field && (
            $field->attribute === $fieldName ||
            \mb_strtolower($field->name) === \mb_strtolower($fieldName)
        );
    }
}
