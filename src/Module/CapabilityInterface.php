<?php

declare(strict_types=1);

namespace Rokke\Contracts\Module;

/**
 * An atomic unit of functionality a module contributes to the application model.
 * Modules declare capabilities during the Build phase; ModelBuilderPasses translate
 * them into DefinitionInterface instances stored in the ApplicationModel.
 */
interface CapabilityInterface {}
