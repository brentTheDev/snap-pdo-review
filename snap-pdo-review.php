<?php

/**
 * inserts this Senator profile into mySQL
 *
 * @param \PDO $pdo PDO connection object
 * @throws \PDOException when mySQL related errors occur
 * @throws \TypeError if $pdo is not a PDO connection object
 **/
public function insert(\PDO $pdo): void {
	// create query template
	$query = "INSERT INTO senator(senatorId, senatorName, senatorNumLives) VALUES(:senatorId, :senatorName, :senatorNumLives)";
	$statement = $pdo->prepare($query);
	// bind the member variables to the place holders in the template
	$parameters = ["senatorId" => $this->senatorId->getBytes(), "senatorName" => $this->senatorName, "senatorNumLives" => $this->senatorNumLives];
	$statement->execute($parameters);
}
/**
 * deletes this Senator profile from mySQL
 *
 * @param \PDO $pdo PDO connection object
 * @throws \PDOException when mySQL related errors occur
 * @throws \TypeError if $pdo is not a PDO connection object
 **/
public function delete(\PDO $pdo): void {
	// create query template
	$query = "DELETE FROM senator WHERE senatorId = :sentatorId";
	$statement = $pdo->prepare($query);
	// bind the member variables to the place holders in the template
	$parameters = ["senatorId" => $this->senatorId->getBytes()];
	$statement->execute($parameters);
}
/**
 * updates this Senator profile from mySQL
 *
 * @param \PDO $pdo PDO connection object
 * @throws \PDOException when mySQL related errors occur
 * @throws \TypeError if $pdo is not a PDO connection object
 **/
public function update(\PDO $pdo): void {
	// create query template
	$query = "UPDATE senator SET senatorName = :senatorName,  = :artistName WHERE artistId = :artistId";
	$statement = $pdo->prepare($query);
	// bind the member variables to the place holders in the template
	$parameters = ["artistId" => $this->artistId->getBytes(), "artistGenre" => $this->artistGenre, "artistName" => $this->artistName];
	$statement->execute($parameters);
}
/**
 * formats the state variables for JSON serialization
 *
 * @return array resulting state variables to serialize
 **/
public function jsonSerialize(): array {
	$fields = get_object_vars($this);
	$fields["artistId"] = $this->artistId->toString();
	return ($fields);
}
}