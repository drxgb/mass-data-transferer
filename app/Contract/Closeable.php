<?php

namespace App\Contract;


interface Closeable
{
	/**
	 * Realiza o encerramento.
	 * 
	 * @return bool
	 */
	function close() : bool;
}
