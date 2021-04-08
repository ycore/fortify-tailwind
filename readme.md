# Tailwind CSS-styled authentication blade views for [**FortifyUI**][link-fortify-ui]

<div align="center">
    <img src="https://github.com/ycore/fortify-tailwind/blob/master/stubs/tailwind/resources/svg/fortify-banner.svg" width="50%" >
</div>

## Introduction

[Fortify-tailwind][link-this] provides authentication UI views and scaffolding for [**FortifyUI**][link-fortify-ui], styled with _[Tailwind CSS](tailwindcss.com)_.

[![Latest Version on Packagist][ico-version]][link-packagist]

## Installation

1. To get started, install [Fortify-tailwind][link-this] using Composer.

``` bash
$ composer require ycore/fortify-tailwind
```
This command initializes [**FortifyUI**][link-fortify-ui] and publishes the [Fortify-tailwind][link-this] authentication views and scaffolding.

- [x] Publishes authentication blade views to `resources/views/`
- [x] Contains `require tailswindcss` in `webpack.mix.js`
- [x] Includes tailwindcss @imports in `resources/app.css`
- [x] Appends a `home` route to `routes/web.php`
- [x] Enables the `login` and `register` _[Laravel Fortify][link-fortify]_ features

This package and [**FortifyUI**][link-fortify-ui] both utilize package auto-discovery. There is no need to add the service providers manually.

2. Next, publish the [Fortify-tailwind][link-this] authentication views and scaffolding:

``` bash
$ php artisan fortify-ui:tailwind
```
3. Then, install & initialize tailwindcss and build the assets
```bash
 npm install tailwindcss autoprefixer --save-dev
 npx tailwindcss init
 npm install
 npm run dev
```

[Fortify-tailwind][link-this] installs a sensible default configuration based on the _[Laravel Fortify][link-fortify]_ recommendations. The `login`, `logout`, `registration` and `reset-passwords` features and routes are enabled by default. If these defaults are sufficient, there is no need for additional configuration.

### Installation options

[Fortify-tailwind][link-this] is designed to be re-installed. Use the `--force` or `--views-only` options to overwrite previously-installed views or scaffolding.

Overwrite all previously installed views and scaffolding
``` bash
$ php artisan fortify-ui:tailwind --force
```
Overwrite all previously installed views only
``` bash
$ php artisan fortify-ui:tailwind --views-only
```


### More configuration options
[**FortifyUI**][link-fortify-ui] also provides more configuration options via the `fortify-ui:publish` command. See the [**FortifyUI** configuration][link-fortify-ui] section for details on publishing additional configuration options.

## Changelog

Please see the [Changelog](changelog.md) for more information on what has changed recently.

## Security

Should you discover any security-related issues, please email y-core@outlook.com instead of using the issue tracker.

## Credits

- [Johan Meyer][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [License file](license.md) for more information.

[link-this]: https://github.com/ycore/fortify-tailwind
[link-fortify-ui]: https://github.com/ycore/fortify-ui
[link-fortify]: https://github.com//laravel/fortify

[ico-version]: https://img.shields.io/packagist/v/ycore/fortify-tailwind.svg?style=flat-square
[link-packagist]: https://packagist.org/packages/ycore/fortify-tailwind
[link-author]: https://github.com/ycore
[link-contributors]: ../../contributors
