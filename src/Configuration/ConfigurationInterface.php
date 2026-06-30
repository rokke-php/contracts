<?php

declare(strict_types=1);

namespace Rokke\Contracts\Configuration;

/**
 * Centralized configuration service.
 * Resolves env, secrets, profiles, overrides, and defaults. Not simple arrays.
 */
interface ConfigurationInterface
{
	public function get(string $key, mixed $default = null): mixed;

	public function has(string $key): bool;

	public function env(string $key, mixed $default = null): mixed;

	public function secret(string $key): string;

	public function profile(): string;
}
