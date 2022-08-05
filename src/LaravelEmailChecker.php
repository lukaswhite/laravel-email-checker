<?php


namespace Lukaswhite\LaravelEmailChecker;

use Illuminate\Support\Facades\Facade;
use Lukaswhite\EmailChecker\Checker;
use Lukaswhite\EmailChecker\Email;

/**
 * @method static Email check(string $email)
 *
 * @see \Lukaswhite\EmailChecker\Checker
 */
class LaravelEmailChecker extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return Checker::class;
    }
}