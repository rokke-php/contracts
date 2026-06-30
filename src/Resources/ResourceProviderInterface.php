<?php

declare(strict_types=1);

namespace Rokke\Contracts\Resources;

interface ResourceProviderInterface
{
	public function acquire(string $poolName): mixed;

	public function release(string $poolName, mixed $resource): void;
}
