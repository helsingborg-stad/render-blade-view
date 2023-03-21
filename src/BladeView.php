<?php

namespace HelsingborgStad\RenderBladeView;

use ReflectionClass;

class BladeView
{
    private \ComponentLibrary\Init $initInstance;
    private array $viewPaths;

    /**
     * BladeView constructor.
     *
     * @param array $viewPaths
     * @param string $initClass
     */
    private function __construct(array $viewPaths, string $initClass)
    {
        $this->viewPaths = $viewPaths;
        $this->setInitInstance($initClass);
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
    public static function create(array $viewPaths, string $initClass): BladeView
    {
        if (empty($viewPaths)) {
            throw new \Exception('No view paths registered, please register at least one.');
        }

        if (empty($initClass)) {
            throw new \Exception('No init class registered');
        }

        return new self($viewPaths, $initClass);
    }

    /**
     * Set the init instance
     *
     * @param string $initClass
     * @return void
     * @throws \Exception
     */
    private function setInitInstance(string $initClass)
    {
        $this->initInstance = (new ReflectionClass($initClass))->newInstance($this->viewPaths);
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

        $bladeEngine = $this->initInstance->getEngine();

        return $bladeEngine->make(
            $view,
            array_merge(
                $data,
                array('errorMessage' => false)
            )
        )->render();
    }
}
