<?php
class person{
	private $personName;

	private $personAge;
// constructor
	public function __construct($newPersonName, $newPersonAge) {
	try{
		$this->setPersonName($newPersonName);
		$this->setPersonAge($newPersonAge);
	} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
		$exceptionType = get_class($exception);
		throw (new $exceptionType($exception->getMessage(), 0, $exception));
	}
	}
// accessor method for name
	public function getPersonName(): string {
		return ($this->personName);
	}
// mutator method for name
	public function setPersonName(string $newPersonName): void {
		$newPersonName = trim($newPersonName);
		$newPersonName = filter_var($newPersonName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newPersonName) === true) {
			throw(new \InvalidArgumentException("name is empty or insecure"));
		}

		if(strlen($newPersonName) >= 64) {
			throw(new \RangeException("name is too large"));
		}

		$this->name = $newPersonName;

	}
// accessor method for age
	public function getPersonAge(): int {
		return ($this->personAge);
	}
// mutator method for age
	public function setPersonAge(int $newPersonAge) {
		if(empty($newPersonAge) === true) {
			throw (new \InvalidArgumentException("age cannot be empty"));
		}

		if(($newPersonAge) <= 0) {
			throw(new \RangeException("oh no you didn't"));
		} elseif(($newPersonAge) < 18 && ($newPersonAge) > 0) {
			return ("hi caleb");
		} elseif(($newPersonAge > 118)) {
			return ("captain @deepdivedylan");
		} else {
			return $this->personAge = $newPersonAge;
		}

	}

// to string method for age
	public function __toString() {
		return ($this->personAge);
	}
}