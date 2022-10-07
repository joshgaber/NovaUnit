<?php

namespace JoshGaber\NovaUnit\Tests\Fixtures\Tools;

use Laravel\Nova\ResourceTool as BaseResourceTool;

class ResourceTool extends BaseResourceTool
{
    /**
     * Get the component name for the resource tool.
     *
     * @return string
     */
    public function component()
    {
        return 'test-resource-tool';
    }

    /**
     * Get the displayable name of the resource tool.
     *
     * @return string
     */
    public function name()
    {
        return 'Test Resource Tool';
    }
}
