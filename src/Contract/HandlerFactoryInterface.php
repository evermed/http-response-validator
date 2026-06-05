<?php

declare(strict_types=1);

namespace ZJKiza\HttpResponseValidator\Contract;

interface HandlerFactoryInterface
{
    /**
     * @template T of HandlerInterface
     *
     * @param class-string<T> $class
     *
     * @return T
     */
    public function create(string $class): HandlerInterface;
}
