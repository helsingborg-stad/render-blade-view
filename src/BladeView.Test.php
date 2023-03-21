<?php

namespace HelsingborgStad\RenderBladeView\Test;

use HelsingborgStad\RenderBladeView\BladeView;
use ComponentLibrary\Init as ComponentLibraryInit;

class RenderTest extends \PHPUnit\Framework\TestCase
{
    protected $mockInitClass = null;

    /**
     * @group unit
     */
    public function testClassIsDefined()
    {
        $this->assertTrue(class_exists(BladeView::class));
    }

    /**
     * @group unit
     */
    public function testCreateReturnsInstance()
    {
        $bladeView = BladeView::create(['foo'], ComponentLibraryInit::class);
        $this->assertInstanceOf(BladeView::class, $bladeView);
    }

    /**
     * @group unit
     */
    public function testCreateRequiresViewPaths()
    {
        // Implement InitInterface in mock class
        $this->expectException(\Exception::class);
        BladeView::create([], 'foo');
    }

    /**
     * @group unit
     */
    public function testCreateRequiresInitClass()
    {
        $this->expectException(\Exception::class);
        BladeView::create(['foo'], '');
    }

    /**
     * @group unit
     */
    public function testRenderThrowsIfViewEmpty()
    {
        $this->expectException(\Exception::class);
        $bladeView = BladeView::create(['foo'], ComponentLibraryInit::class);
        $bladeView->render('', []);
    }

    /**
     * @group unit
     */
    public function testRenderReturnsMarkup()
    {
        $bladeView = BladeView::create([__DIR__ . '/../test/views'], ComponentLibraryInit::class);
        $this->assertEquals('Hello, bar.', $bladeView->render('foo', ['name' => 'bar']));
    }
}
