<?php

namespace App\Util;


trait GetterTrait
{
	public function __get(string $name) : mixed
	{
		if (property_exists($this, $name))
		{
			if (in_array($name, $this->restrictedGetters()))
			{
				throw new \Exception("Cannot access the protected key $name.");
			}

			return $this->$name;
		}

		throw new \Exception("The key $name does not exist.");
	}


	/**
	 * Recebe a lista de getters restritos.
	 * @return array
	 */
	protected function restrictedGetters() : array
	{
		return [];
	}
}
