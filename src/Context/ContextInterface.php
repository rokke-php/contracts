<?php

declare(strict_types=1);

namespace Rokke\Contracts\Context;

/**
 * Represents an isolated context for a single coroutine.
 * When the coroutine finishes, everything is destroyed.
 */
interface ContextInterface
{
	public function id(): string;

	public function set(string $key, mixed $value): void;

	public function get(string $key, mixed $default = null): mixed;

	public function has(string $key): bool;

	/**
	 * Registers a callback invoked when destroy() is called.
	 * Use this to release pooled resources or run cleanup logic.
	 */
	public function onDestroy(callable $callback): void;

	/**
	 * Safely destroys the current context and its resources.
	 */
	public function destroy(): void;
}
