<?php

namespace App\Util;


trait SetterTrait
{
	public function __set(string $name, mixed $value) : void
	{
		if (property_exists($this, $name))
		{
			if (in_array($name, $this->restrictedSetters()))
			{
				throw new \Exception("Cannot set the protected key $name.");
			}

			$this->$name = $value;
		}
		else
		{
			throw new \Exception("The key $name does not exist.");
		}
	}


	/**
	 * Recebe a lista de setters restritos.
	 * 
	 * @return array
	 */
	protected function restrictedSetters() : array
	{
		return [];
	}
}
