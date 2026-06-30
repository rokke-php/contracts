# rokke/contracts

Public platform contracts for the [Rokke Framework](https://rokke.dev) — the interfaces and shared vocabulary that define how the platform and its modules communicate.

## What this is

`rokke/contracts` is the dependency anchor of the Rokke ecosystem. Platform modules (`rokke/http`, `rokke/orm`, `rokke/queue`, …) depend on this package to implement platform extension points, without knowing anything about the runtime engine.

```
rokke/contracts          ← you are here
      ↑
      ├── rokke/runtime
      ├── rokke/http
      ├── rokke/orm
      └── rokke/queue
```

This package contains only interfaces and enums. No implementations, no runtime dependencies — just the language of the platform.

## Installation

```bash
composer require rokke/contracts
```

Requires PHP 8.4+.

## Contracts

### `Rokke\Contracts\Module\ModuleInterface`

Every platform module implements this. The runtime discovers, boots, and stops modules through this interface.

```php
use Rokke\Contracts\Module\ModuleInterface;

final class HttpModule implements ModuleInterface
{
    public function name(): string { return 'http'; }
    public function boot(): void { /* register services */ }
    public function start(): void { /* start server */ }
    public function stop(): void { /* graceful shutdown */ }
    public function health(): bool { return true; }
    public function dependencies(): array { return []; }
}
```

### `Rokke\Contracts\Lifecycle\LifecycleEventsInterface`

Subscribe to application lifecycle events. Modules use this to react to state changes without controlling transitions.

```php
use Rokke\Contracts\Lifecycle\LifecycleEventsInterface;

$lifecycle->onRunning(function (): void {
    // application is fully started
});

$lifecycle->onStopping(function (): void {
    // drain in-flight requests
});
```

Available hooks: `onBootstrapping`, `onStarting`, `onRunning`, `onStopping`, `onStopped`.

### `Rokke\Contracts\Lifecycle\ApplicationState`

Enum representing the application lifecycle state. Used as shared vocabulary when subscribing to lifecycle events.

```
Created → Bootstrapping → Starting → Running → Stopping → Stopped
```

### `Rokke\Contracts\Pipeline\PipelineInterface`

Fluent pipeline — send a payload through middleware layers to a final handler.

```php
$result = $pipeline
    ->send($request)
    ->through([$authMiddleware, $loggingMiddleware])
    ->then(fn ($req) => $handler->handle($req));
```

### `Rokke\Contracts\Container\ServiceContainerInterface`

Dependency injection container extending PSR-11. Supports singleton, scoped, transient, and pooled bindings.

```php
$container->singleton(CacheInterface::class, RedisCache::class);
$container->pooled(DatabaseInterface::class, fn () => new Connection(), min: 2, max: 10);
```

### `Rokke\Contracts\Resources\ResourceProviderInterface`

Consume pooled resources. `acquire` checks out a resource; `release` returns it to the pool.

```php
$connection = $resources->acquire('database');
try {
    // use $connection
} finally {
    $resources->release('database', $connection);
}
```

### `Rokke\Contracts\Context\ContextInterface`

Per-coroutine isolated state. Set values at the start of a request; they disappear automatically when the coroutine ends.

```php
$context->set('user', $authenticatedUser);
$user = $context->get('user');
```

### `Rokke\Contracts\Events\EventBusInterface`

Dispatch domain events synchronously, as a coroutine, in the background, or across nodes.

```php
$bus->dispatchSync(new UserRegistered($user));
$bus->dispatchBackground(new SendWelcomeEmail($user));
```

### `Rokke\Contracts\Configuration\ConfigurationInterface`

Read configuration, environment variables, and secrets.

```php
$dsn    = $config->env('DATABASE_URL');
$apiKey = $config->secret('STRIPE_KEY');
$debug  = $config->get('app.debug', false);
```

### `Rokke\Contracts\Time\ClockInterface`

Testable time abstraction.

```php
$now = $clock->now(); // DateTimeImmutable
```

## Governing criterion

A contract lives here if and only if **multiple legitimate implementations can exist outside the runtime engine**.

- `ModuleInterface` → any module author implements it → **here**
- `WorkerManagerInterface` → only the runtime implements it → **rokke/runtime**

## Stability

This package is intentionally the most stable in the Rokke ecosystem. Breaking changes require architectural justification. Treat every interface here as a signed API contract.

New interfaces start as internal contracts inside their first module and are promoted here only after two or more independent modules prove the abstraction.

## License

MIT
