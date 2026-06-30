<?php

declare(strict_types=1);

namespace Rokke\Contracts\Time;

use DateTimeImmutable;

/**
 * Eliminates coupling with the system's time().
 * Facilitates testing, time travel, and simulations.
 */
interface ClockInterface
{
	public function now(): DateTimeImmutable;

	public function sleep(float $seconds): void;
}
