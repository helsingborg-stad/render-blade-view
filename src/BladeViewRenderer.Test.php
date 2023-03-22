<?php

namespace HelsingborgStad\RenderBladeView\Test;

use HelsingborgStad\RenderBladeView\BladeViewRenderer;
use ComponentLibrary\Init as ComponentLibraryInit;

class RenderTest extends \PHPUnit\Framework\TestCase
{
    protected $bladeEngine = null;

    protected function setUp(): void
    {
        $this->bladeEngine = $this->getBladeEngine();
    }

    protected function tearDown(): void
    {
        $this->bladeEngine = null;
    }

    /**
     * @group unit
     */
    public function testClassIsDefined()
    {
        $this->assertTrue(class_exists(BladeViewRenderer::class));
    }

    /**
     * @group unit
     */
    public function testCreateReturnsInstance()
    {
        $bladeView = BladeViewRenderer::create($this->bladeEngine);
        $this->assertInstanceOf(BladeViewRenderer::class, $bladeView);
    }

    /**
     * @group unit
     */
    public function testCreateThrowsIfBladeEngineIsEmpty()
    {
        $this->expectException(\Exception::class);
        BladeViewRenderer::create();
    }

    /**
     * @group unit
     */
    public function testRenderThrowsIfViewEmpty()
    {
        $this->expectException(\Exception::class);
        $bladeView = BladeViewRenderer::create($this->bladeEngine);
        $bladeView->render('', []);
    }

    /**
     * @group unit
     */
    public function testRenderReturnsMarkup()
    {
        $bladeView = BladeViewRenderer::create($this->bladeEngine);
        $this->assertEquals('Hello, bar.', $bladeView->render('foo', ['name' => 'bar']));
    }

    private function getBladeEngine()
    {
        $views                = [__DIR__ . '/../test/views'];
        $componentLibraryInit = new ComponentLibraryInit($views);
        $bladeEngine          = $componentLibraryInit->getEngine();

        return $bladeEngine;
    }
}
