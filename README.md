<!-- SHIELDS -->
[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![License][license-shield]][license-url]

[![Logo](docs/images/hbg-github-logo-combo.png)](https://github.com/helsingborg-stad/render-blade-view)

# render-blade-view

Functionality for rendering PHP Blade views.

[Report bug](https://img.shields.io/github/contributors/helsingborg-stad/render-blade-view/issues)
[Request Feature](https://img.shields.io/github/contributors/helsingborg-stad/render-blade-view/issues)

## Install using Composer
```composer require helsingborg-stad/render-blade-view```

## Requirements

* PHP ^7.4

## Usage
```php
class BladeEngine {
    // The bladeEngine to be passed to BladeView::create must have a render function following this signature.
    public function render(string $view, array $data):string;
}

$bladeEngine = new BladeEngine();
$view = 'foo';
$viewData = ['foo' => 'bar'];

$bladeView = BladeView::create($bladeEngine);
$bladeView->render($view, $viewData);
```

## License
Distributed under the [MIT License][license-url].

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/helsingborg-stad/render-blade-view.svg?style=flat-square
[contributors-url]: ttps://img.shields.io/github/contributors/helsingborg-stad/render-blade-view/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/helsingborg-stad/readme.md.svg?style=flat-square
[forks-url]: ttps://img.shields.io/github/contributors/helsingborg-stad/render-blade-view/network/members
[stars-shield]: https://img.shields.io/github/stars/helsingborg-stad/readme.md.svg?style=flat-square
[stars-url]: ttps://img.shields.io/github/contributors/helsingborg-stad/render-blade-view/stargazers
[issues-shield]: https://img.shields.io/github/issues/helsingborg-stad/readme.md.svg?style=flat-square
[issues-url]: ttps://img.shields.io/github/contributors/helsingborg-stad/render-blade-view/issues
[license-shield]: https://img.shields.io/github/license/helsingborg-stad/readme.md.svg?style=flat-square
[license-url]: https://raw.githubusercontent.com/helsingborg-stad/readme.md/main/LICENSE