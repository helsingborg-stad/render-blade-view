<?php

namespace HelsingborgStad\RenderBladeView;

interface BladeEngineInterface
{
    public function make(string $view, array $data = []): RendererInterface;
}
