<?php

namespace App\Contract;


interface Bootable
{
	/**
	 * Realiza a inicialização.
	 * 
	 * @return bool
	 */
	function boot() : bool;
}
