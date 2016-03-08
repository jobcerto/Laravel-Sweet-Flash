# Laravel Sweet-Flash

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

## Install

### Requirements

[SweetAlert](http://t4t5.github.io/sweetalert/) by [t4t5](https://github.com/t4t5)

Via Composer

``` bash
$ composer require draperstudio/laravel-sweet-flash
```

And then include the service provider within `app/config/app.php`.

``` php
'providers' => [
    DraperStudio\SweetFlash\ServiceProvider::class
];
```

## Usage


```html
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Laravel PHP Framework</title>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.0.1/sweetalert.min.css">
    </head>

    <body>
        <div class="container">
            <h1>My Page!</h1>
        </div>

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.0.1/sweetalert.min.js"></script>
        @include('sweet::flash')
    </body>
</html>

```

#### Message (Defaults to Info)
``` php
sweet('Welcome aboard!');

return redirect()->route('dashboard');
```

#### Success
``` php
sweet()->success('You successfully read this important alert message.');

return redirect()->route('dashboard');
```

#### Info

``` php
sweet()->info('This alert needs your attention, but it\'s not super important.');

return redirect()->route('dashboard');
```

#### Warning
``` php
sweet()->warning('Better check yourself, you\'re not looking too good.');

return redirect()->route('dashboard');
```

#### Error

``` php
sweet()->error('Change a few things up and try submitting again.');

return redirect()->route('dashboard');
```

#### Build your own Alert
``` php
sweet()->config('title', 'Are you sure?')
       ->config('text', 'You will not be able to recover this imaginary file!')
       ->config('type', 'warning')
       ->config('showCancelButton', true)
       ->config('confirmButtonColor', '#DD6B55')
       ->config('confirmButtonText', 'Yes, delete it!')
       ->config('cancelButtonText', 'No, cancel plx!')
       ->config('closeOnConfirm', false)
       ->config('closeOnCancel', false)
       ->config('showConfirmButton', true)
       ->config('timer', null)
       ->callback('function(isConfirm) {
           if (isConfirm) {
               swal("Deleted!", "Your imaginary file has been deleted.", "success");
           } else {
               swal("Cancelled", "Your imaginary file is safe :)", "error");
           }
       }')
       ->commit();

return redirect()->route('dashboard');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email hello@draperstudio.tech instead of using the issue tracker.

## Credits

- [DraperStudio][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/DraperStudio/laravel-sweet-flash.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/DraperStudio/Laravel-Sweet-Flash/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/DraperStudio/laravel-sweet-flash.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/DraperStudio/laravel-sweet-flash.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/DraperStudio/laravel-sweet-flash.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/DraperStudio/laravel-sweet-flash
[link-travis]: https://travis-ci.org/DraperStudio/Laravel-Sweet-Flash
[link-scrutinizer]: https://scrutinizer-ci.com/g/DraperStudio/laravel-sweet-flash/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/DraperStudio/laravel-sweet-flash
[link-downloads]: https://packagist.org/packages/DraperStudio/laravel-sweet-flash
[link-author]: https://github.com/DraperStudio
[link-contributors]: ../../contributors
