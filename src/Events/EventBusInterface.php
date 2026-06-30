<?php

declare(strict_types=1);

namespace Rokke\Contracts\Events;

/**
 * Centralizes all events.
 * Not only user events, but also system events.
 */
interface EventBusInterface
{
	/**
	 * Dispatches the event synchronously, blocking the current flow.
	 */
	public function dispatchSync(object $event): void;

	/**
	 * Dispatches the event in a new coroutine but on the same worker.
	 */
	public function dispatchCoroutine(object $event): void;

	/**
	 * Delegates the event to a Task Worker (heavy background process).
	 */
	public function dispatchBackground(object $event): void;

	/**
	 * Propagates the event to the entire cluster / other nodes if enabled.
	 */
	public function dispatchDistributed(object $event): void;

	/**
	 * Registers a listener for an event.
	 */
	public function listen(string $eventClass, callable $listener): void;
}
