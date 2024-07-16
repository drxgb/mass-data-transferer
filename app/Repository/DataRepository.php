<?php

namespace App\Repository;

use PDO;

class DataRepository
{
	public function __construct(
		private PDO $db,
		private string $table,
		private string|int $primaryKey,
		private string $column
	)
	{}


	/**
	 * Recebe as linhas da coluna da tabela solicitada.
	 *
	 * @return array
	 */
	public function read() : array
	{
		$id = $this->primaryKey;
		$column = $this->column;
		$table = $this->table;
		$query = "SELECT $id, $column FROM $table";

		$stmt = $this->db->prepare($query);
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


	/**
	 * Escreve as linhas para uma tabela.
	 *
	 * @param int|string $id
	 * @param mixed $value
	 * @return void
	 */
	public function write(int|string $id, mixed $value) : void
	{
		$table = $this->table;
		$column = $this->column;
		$key = $this->primaryKey;
		$query = "UPDATE $table SET $column = :val WHERE $key = :id";

		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':id', $id);
		$stmt->bindValue(':val', $value);
		$stmt->execute();
	}
}
