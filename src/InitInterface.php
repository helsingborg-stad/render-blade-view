<?php

namespace HelsingborgStad\RenderBladeView;

interface InitInterface
{
    public function __construct($externalViewPaths);
    public function getEngine(): BladeEngineInterface;
}
