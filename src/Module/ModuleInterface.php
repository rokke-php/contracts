<?php

declare(strict_types=1);

namespace Rokke\Contracts\Module;

/**
 * Contract every platform module must implement.
 * A module declares its capabilities to the Runtime during the Build phase
 * using the ModuleBuilder — no direct boot or shutdown logic.
 */
interface ModuleInterface
{
	/**
	 * Registers the module's capabilities into the application graph.
	 * Called exactly once during compilation, never at runtime.
	 */
	public function register(ModuleBuilderInterface $builder): void;
}
