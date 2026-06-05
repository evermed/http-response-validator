<?php

declare(strict_types=1);

namespace ZJKiza\HttpResponseValidator\Handler\Factory;

use ZJKiza\HttpResponseValidator\Contract\HandlerFactoryInterface;
use ZJKiza\HttpResponseValidator\Contract\HandlerInterface;

final class HandlerFactory implements HandlerFactoryInterface
{
    /**
     * @var array<class-string, HandlerInterface<mixed, mixed>>
     */
    private array $handlers;

    /**
     * @param iterable<class-string, HandlerInterface<mixed, mixed>> $handlers
     */
    public function __construct(
        iterable $handlers,
    ) {
        $this->handlers = $handlers instanceof \Traversable ? \iterator_to_array($handlers, true) : $handlers;
    }

    /**
     * @template T of HandlerInterface
     *
     * @param class-string<T> $class
     *
     * @return T
     */
    public function create(string $class): HandlerInterface
    {
        $handler = $this->handlers[$class]
            ?? throw new \RuntimeException(\sprintf("Handler '%s' not found.", $class));

        /** @var T */
        return $handler;
    }
}
