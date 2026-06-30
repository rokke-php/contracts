<?php

declare(strict_types=1);

namespace Rokke\Contracts\Module;

/**
 * First-class citizens.
 * HTTP, ORM, Cache, Queue — everything is a module that exposes this interface.
 */
interface ModuleInterface
{
	public function name(): string;

	/**
	 * Early initialization phase. (E.g. register configurations or lazy services).
	 */
	public function boot(): void;

	/**
	 * Start phase. The module begins active operation.
	 */
	public function start(): void;

	/**
	 * Graceful shutdown phase of the module.
	 */
	public function stop(): void;

	/**
	 * Indicates the health status of the module itself.
	 */
	public function health(): bool;

	/**
	 * Array with the names of other modules this one depends on.
	 * @return string[]
	 */
	public function dependencies(): array;
}
