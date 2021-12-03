# Laravel E-mail Checker

A Laravel package for checking e-mail addresses; to see if they've been issued by a provider of free/throwaway/disposable addresses. Useful to try to combat spam and fake accounts.

## Usage

The package needs to download the data provided by the [freemail](https://github.com/willwhite/freemail) project. It's a very quick process; it just needs to know where to put the files.

By default, it'll put them in a directory named `email-checker` on your local disk, but feel free to tweak that. Just publish the config file:

```bash
php artisan vendor:publish --provider="Lukaswhite\LaravelEmailChecker\LaravelEmailCheckerServiceProvider" 
```

Then simply run the following command:

```bash
php artisan email-checker:install
```

Now you can check an e-mail address using the façade:

```php
use Lukaswhite\LaravelEmailChecker\LaravelEmailChecker;

$result = LaravelEmailChecker::check('spammer@spammy.spam');
```

This returns an object with the following methods:

```php
$result->isDisposable();
$result->isFree();
$result->isBlacklisted();
```

## Updating the Data

To ensure the data's up-to-date, simply run the following command. It should only take a few seconds, network speed permitting:

```bash
php artisan email-checker:update
```