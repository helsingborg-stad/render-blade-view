<?php

namespace HelsingborgStad\RenderBladeView;

class BladeView
{
    private InitInterface $initInstance;
    private BladeEngineInterface $bladeEngine;
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
        $this->bladeEngine = $this->initInstance->getEngine();
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

        try {
            $implements = class_implements($initClass);

            if ($implements === false || !in_array(InitInterface::class, $implements)) {
                throw new \Exception();
            }
        } catch (\Throwable $th) {
            throw new \Exception('Init class must implement InitInterface');
        }

        $this->initInstance = new $initClass($this->viewPaths);
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

        return $this->bladeEngine->make(
            $view,
            array_merge(
                $data,
                array('errorMessage' => false)
            )
        )->render();
    }
}
