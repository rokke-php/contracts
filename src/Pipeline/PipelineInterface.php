<?php

declare(strict_types=1);

namespace Rokke\Contracts\Pipeline;

interface PipelineInterface
{
	public function send(mixed $input): static;

	/** @param array<callable|object> $middlewares */
	public function through(array $middlewares): static;

	public function then(callable $handler): mixed;
}
