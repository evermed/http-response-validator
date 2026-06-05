<?php

declare(strict_types=1);

namespace ZJKiza\HttpResponseValidator\Monad;

use ZJKiza\HttpResponseValidator\Contract\HandlerInterface;

/**
 * @psalm-suppress ImplementedReturnTypeMismatch
 *
 * @template T
 *
 * @extends Result<T>
 */
final class Success extends Result
{
    /**
     * @template R
     *
     * @param HandlerInterface<mixed, R> $fn
     *
     * @return Result<R>|Result<\Throwable>
     */
    public function bind(HandlerInterface $fn): Result
    {
        try {
            /** @var Result<R> $result */
            $result = $fn($this->value);

            return $result;
        } catch (\Throwable $e) {
            /** @return Result<\Throwable> */
            return new Failure($e, $e);
        }
    }

    /**
     * @return T
     */
    public function getOrThrow(): mixed
    {
        return $this->value;
    }
}
