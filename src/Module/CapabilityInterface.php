<?php

declare(strict_types=1);

namespace Rokke\Contracts\Module;

/**
 * An atomic unit of functionality a module contributes to the application graph.
 * Examples: an HTTP operation, a service provider, a transport host.
 */
interface CapabilityInterface
{
	/**
	 * Canonical capability type (e.g. 'operation', 'service_provider', 'host').
	 * The RuntimeBuilder uses this type to delegate processing to the correct pass.
	 */
	public function type(): string;

	/**
	 * Structural data for this capability.
	 * The contract of this value is defined by the pass that consumes this type.
	 */
	public function descriptor(): mixed;
}
