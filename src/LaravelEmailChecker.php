<?php


namespace Lukaswhite\LaravelEmailChecker;

use Illuminate\Support\Facades\Facade;
use Lukaswhite\EmailChecker\Checker;

/**
 * @method static string getUuid()
 * @method static mixed withinBatch(\Closure $callback)
 * @method static void startBatch()
 * @method static void setBatch(string $uuid): void
 * @method static bool isOpen()
 * @method static void endBatch()
 *
 * @see \Lukaswhite\EmailChecker\Checker
 */
class LaravelEmailChecker extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Checker::class;
    }
}