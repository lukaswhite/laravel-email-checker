# Laravel E-mail Checker

A Laravel package for checking e-mail addresses; to see if they've been issued by a provider of free/throwaway/disposable addresses, or are on a domain that's been blacklisted. 

You may find it useful to try to combat spam and fake accounts; it ought to be straightforward to integrate it into the registration process.

## Usage

The package needs to download the data provided by the [freemail](https://github.com/willwhite/freemail) project. It's a very quick process; it just needs to know where to put the files.

By default, it'll put them in a directory named `email-checker` on your local disk, but feel free to tweak that. Just publish the config file:

```bash
php artisan vendor:publish --provider="Lukaswhite\LaravelEmailChecker\LaravelEmailCheckerServiceProvider" 
```

Alternatively, simply add an entry to your `.env` file named `EMAIL_CHECKER_DIRECTORY`.

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
$result->isDisposable(); // true|false
$result->isFree(); // true|false
$result->isBlacklisted(); // true|false
```

## Updating the Data

To ensure the data's up-to-date, simply run the following command. It should only take a few seconds, network speed permitting:

```bash
php artisan email-checker:update
```