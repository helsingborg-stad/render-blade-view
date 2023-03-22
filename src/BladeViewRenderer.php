<?php

namespace HelsingborgStad\RenderBladeView;

use ReflectionClass;

class BladeViewRenderer
{
    private $bladeEngine;

    /**
     * BladeView constructor.
     *
     * @param array $viewPaths
     * @param string $initClass
     */
    private function __construct($bladeEngine)
    {
        $this->bladeEngine = $bladeEngine;
    }

    /**
     * Create a new instance
     *
     * @param array $viewPaths
     * @param string $initClass
     *
     * @return BladeView
     * @throws \Exception
     */
    public static function create($bladeEngine = null): BladeViewRenderer
    {
        if (empty($bladeEngine)) {
            throw new \Exception('No blade engine registered');
        }

        return new self($bladeEngine);
    }

    /**
     * Render a view
     *
     * @param string $view
     * @param array $data
     * @return string
     * @throws \Exception
     */
    public function render(string $view, array $data = []): string
    {
        if (empty($view)) {
            throw new \Exception('No view registered');
        }

        $data['errorMessage'] = false;
        $markup               = $this->bladeEngine->make($view, $data)->render();

        return $markup;
    }
}
