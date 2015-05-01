[![PHPCI](http://phpci.corpsee.com/build-status/image/2?branch=master&label=PHPCI&style=flat-square)](http://phpci.corpsee.com/build-status/view/2?branch=master)
[![Travis](https://img.shields.io/travis/corpsee/php-utf-8/master.svg?label=Travis&style=flat-square)](https://travis-ci.org/corpsee/php-utf-8?branch=master)
[![Latest Version](https://img.shields.io/packagist/v/corpsee/php-utf-8.svg?label=Version&style=flat-square)](https://packagist.org/packages/corpsee/php-utf-8)
[![Total downloads](https://img.shields.io/packagist/dt/corpsee/php-utf-8.svg?label=Downloads&style=flat-square)](https://packagist.org/packages/corpsee/php-utf-8)
[![License](https://img.shields.io/packagist/l/corpsee/php-utf-8.svg?label=License&style=flat-square)](https://packagist.org/packages/corpsee/php-utf-8)
[![SensioLabs Insight](https://img.shields.io/sensiolabs/i/f348ff6a-40e9-4259-af1f-e88f5f9c588d.svg?label=Insight&style=flat-square)](https://insight.sensiolabs.com/projects/f348ff6a-40e9-4259-af1f-e88f5f9c588d)

PHP-UTF-8
=========

This is fork of the [FSX/php-utf8][8] library. It was created because the author of
origin library doesn`t support it.

php-utf8 is a UTF-8 aware library of functions mirroring PHP's own string
functions. Does not require PHP mbstring extension though will use it, if
found, for a (small) performance gain.

The project was initially on sourceforge where it died due to lack of development
and support. This project has been forked and moved to github.com so that many
more people can actually contribute with more ease.

Use the [issue tracker][1] here on github.com, to post about problems and
feature requests.

Please feel free to fork and get back to us with fork requests for optimizations
and new features.

Documentation & Usage Information
---------------------------------

Using the php-utf-8 library is quite easy. Just include the `php-utf8.php` and
any additional functions that you may need from the `functions` folder.

Sample Code:

```php
// get the core functions included ...
require('php-utf8_path/php-utf8.php');

// ... and any other functions/*.php or utils/*.php files you may need.
require('php-utf8_path/functions/trim.php');
```

Make sure that you are confident about using the library by reading
[Character Sets / Character Encoding Issues][2] and [Handling UTF-8 with PHP][3].

Use these functions **only** if you really need them & you understand **why**
you need to use them.

In particular, do not blindly replace all use of PHP's string functions which
functions found here. Most of the time you will not need to, and you will be
introducing a significant performance overhead to your application.

Most of the functions here are not operating *defensively*, mainly for performance
reasons. For example there is no extensive parameter checking and it is assumed
that they are fed with well formed UTF-8. This is particularly relevant when is
comes to catching badly formed UTF-8. You should screen input on the *outer perimeter*
with help from functions in the `utils/validation.php` and `utils/bad.php` files.

Throughout the library **all** ASCII characters (*control characters included*)
are treated as valid throughout the library. Make sure you take the appropriate
measures before outputting into XML since it can become ill-formed with some
control characters. [more info][5]

Licensing
---------

The initial code of php-utf-8 is published under LGPL. Please find a copy of the
license in the LICENSE file.

Parts of the code in this library come from other places, under different licenses.
The authors involved have been contacted (see below).
Attribution for which code came from elsewhere can be found in the source code itself.

* Andreas Gohr / Chris Smith of Dokuwiki. *There is a fair degree of collaboration/exchange of ideas and code
between [Dokuwiki's UTF-8 library][6] and phputf8. Although Dokuwiki is released under GPL, its UTF-8 library
is released under LGPL, hence no conflict with phputf8*
* Henri Sivonen ([site][7]) *has also given permission for his code to be released under the terms of the LGPL.
He ported a Unicode / UTF-8 converter from the Mozilla codebase to PHP, which is re-used in php-utf-8.*

[1]: https://github.com/corpsee/php-utf-8/issues
[2]: http://www.phpwact.org/php/i18n/charsets
[3]: http://www.phpwact.org/php/i18n/utf-8
[4]: http://www.phpwact.org/php/i18n/utf-8
[5]: http://hsivonen.iki.fi/producing-xml/#controlchar
[6]: http://dev.splitbrain.org/view/darcs/dokuwiki/inc/utf8.php
[7]: http://hsivonen.iki.fi/php-utf8/
[8]: https://github.com/FSX/php-utf8
