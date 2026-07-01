<?php

declare(strict_types=1);

namespace Rokke\Contracts\Module;

/**
 * Declarative API the Runtime provides to each module during the Build phase.
 * The module calls its methods to register capabilities into the application graph.
 */
interface ModuleBuilderInterface
{
	public function addCapability(CapabilityInterface $capability): void;
}
