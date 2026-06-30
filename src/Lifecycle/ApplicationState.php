<?php

declare(strict_types=1);

namespace Rokke\Contracts\Lifecycle;

enum ApplicationState
{
	case Created;
	case Bootstrapping;
	case Starting;
	case Running;
	case Stopping;
	case Stopped;
}
