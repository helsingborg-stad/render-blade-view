<?php

namespace HelsingborgStad\RenderBladeView\Test;

use HelsingborgStad\RenderBladeView\BladeView;
use HelsingborgStad\RenderBladeView\InitInterface;

class RenderTest extends \PHPUnit\Framework\TestCase
{
    protected $mockInitClass = null;

    public function testClassIsDefined()
    {
        $this->assertTrue(class_exists(BladeView::class));
    }

    public function testCreateReturnsInstance()
    {
        $bladeView = BladeView::create(['foo'], $this->getMockInitClass());
        $this->assertInstanceOf(BladeView::class, $bladeView);
    }

    public function testCreateRequiresViewPaths()
    {
        // Implement InitInterface in mock class
        $this->expectException(\Exception::class);
        BladeView::create([], 'foo');
    }

    public function testCreateRequiresInitClass()
    {
        $this->expectException(\Exception::class);
        BladeView::create(['foo'], '');
    }

    public function testCreateRequiresInitClassThatImplementsInitInterface()
    {
        $this->expectException(\Exception::class);
        BladeView::create(['foo'], 'foo');
    }

    public function testRenderReturnsString()
    {
        $bladeView = BladeView::create(['foo'], $this->getMockInitClass());
        $this->assertIsString($bladeView->render('foo', []));
    }

    public function testRenderThrowsIfViewEmpty()
    {
        $this->expectException(\Exception::class);
        $bladeView = BladeView::create(['foo'], $this->getMockInitClass());
        $bladeView->render('', []);
    }

    public function testRenderDoesNotRequireData()
    {
        $bladeView = BladeView::create(['foo'], $this->getMockInitClass());
        $this->assertIsString($bladeView->render('foo'));
    }

    private function getMockInitClass(): string
    {
        $mock = $this->createMock(InitInterface::class);
        return $mock::class;
    }
}
