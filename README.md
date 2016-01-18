# Laravel Sweet-Flash

Based on [SweetAlert](https://github.com/uxweb/sweet-alert) by [uxweb](https://github.com/uxweb).

## Requirements

[SweetAlert](http://t4t5.github.io/sweetalert/) by [t4t5](https://github.com/t4t5)

## New

- Completely configurable
    - **Build whatever SweetAlert configuration you need with a fluent interface**

## Installation

First, pull in the package through Composer.

```js
composer require draperstudio/laravel-sweet-flash:1.0.*@dev
```

And then include the service provider within `app/config/app.php`.

```php
'providers' => [
    DraperStudio\SweetFlash\ServiceProvider::class
];
```

## Usage

Within your controllers, before you perform a redirect...

```php
public function store()
{
    sweet('Welcome Aboard!');

    return redirect('dashboard');
}
```

You may also do:

- `sweet()->success('Message')`
- `sweet()->info('Message')`
- `sweet()->warning('Message')`
- `sweet()->error('Message')`

Again, this will set one key in the session:

- `sweet_flash.flash` - The SweetAlert JSON configuration you're flashing

Because flash messages and overlays are so common, if you want, you may use (or modify) the views that are included with this package. Simply append to your layout view:

```html
@include('sweet::flash')
```

## Example

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
```php
sweet('Welcome aboard!');

return redirect()->route('dashboard');
```

#### Success
```php
sweet()->success('You successfully read this important alert message.');

return redirect()->route('dashboard');
```

#### Info

```php
sweet()->info('This alert needs your attention, but it\'s not super important.');

return redirect()->route('dashboard');
```

#### Warning
```php
sweet()->warning('Better check yourself, you\'re not looking too good.');

return redirect()->route('dashboard');
```

#### Error

```php
sweet()->error('Change a few things up and try submitting again.');

return redirect()->route('dashboard');
```

#### Build your own Alert
```php
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
