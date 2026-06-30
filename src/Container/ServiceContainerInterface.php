<?php

declare(strict_types=1);

namespace Rokke\Contracts\Container;

use Psr\Container\ContainerInterface as PsrContainer;

/**
 * Service Container that understands the real lifecycle in a persistent environment.
 */
interface ServiceContainerInterface extends PsrContainer
{
	public function singleton(string $id, mixed $concrete = null): void;

	public function scoped(string $id, mixed $concrete = null): void;

	public function transient(string $id, mixed $concrete = null): void;

	/**
	 * Registers a pool-based service managed by the ResourceManager.
	 */
	public function pooled(string $id, callable $factory, int $min, int $max): void;

	public function alias(string $alias, string $abstract): void;

	/**
	 * Resolves an instance, passing extra parameters if needed.
	 *
	 * @param array<string, mixed> $parameters
	 */
	public function make(string $id, array $parameters = []): mixed;
}
