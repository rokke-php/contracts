<?php

declare(strict_types=1);

namespace Rokke\Contracts\Lifecycle;

interface LifecycleEventsInterface
{
	public function onBootstrapping(callable $listener): void;

	public function onStarting(callable $listener): void;

	public function onRunning(callable $listener): void;

	public function onStopping(callable $listener): void;

	public function onStopped(callable $listener): void;
}
