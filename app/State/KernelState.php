<?php

namespace App\State;
use App\Contract\Runnable;
use App\Core\Direction;
use App\Core\Kernel;


abstract class KernelState implements Runnable
{
	public function __construct(
		protected Kernel $kernel,
		protected Direction $direction = Direction::READ
	)
	{}
}
