<?php
	namespace Edu\Cnm\snap-

	require_once("autoload.php");
	require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");

	use Ramsey\Uuid\Uuid;

	class Senator implements \JsonSerializable {
		use ValidateUuid;
		/**
		 * id for the Senator; this is the primary key
		 * @var string|Uuid $senatorId
		 */
		private $senatorId;
		/**
		 * name of the senator
		 * @var string $senatorName
		 */
		private $senatorName;
		/**
		 * number of lives of the senator
		 * @var tinyint $senatorNumLives
		 */
		private $senatorNumLives;

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
			$query = "UPDATE senator SET senatorName = :senatorName, senatorNumLives = :senatorNumLives WHERE senatorId = :senatorId";
			$statement = $pdo->prepare($query);
			// bind the member variables to the place holders in the template
			$parameters = ["senatorId" => $this->senatorId->getBytes(), "senatorName" => $this->senatorName, "senatorNumLives" => $this->senatorNumLives];
			$statement->execute($parameters);
		}
	}