<?php

declare(strict_types=1);

namespace ZJKiza\HttpResponseValidator\Tests\Resources\Handler;

use ZJKiza\HttpResponseValidator\Contract\HandlerInterface;
use ZJKiza\HttpResponseValidator\Monad\Result;

/**
 * @implements HandlerInterface<mixed, mixed>
 */
final class ThrowingHandler implements HandlerInterface
{
    public static function getIndex(): string
    {
        return 'throwing_handler';
    }

    public function __invoke(mixed $value): Result
    {
        throw new \RuntimeException('bind failure');
    }
}
