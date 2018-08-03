<?php
class person{
	private $name;

	private $age;
// constructor
	public function __construct($newName, $newAge) {
	try{
		$this->setName($newName);
		$this->setAge($newAge);
	} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
		$exceptionType = get_class($exception);
		throw (new $exceptionType($exception->getMessage(), 0, $exception));
	}
	}
// accessor method for name
	public function getName(): string {
		return ($this->name);
	}
// mutator method for name
	public function setName(string $newName): void {
		$newName = trim($newName);
		$newName = filter_var($newName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newName) === true) {
			throw(new \InvalidArgumentException("name is empty or insecure"));
		}

		if(strlen($newName) >= 64) {
			throw(new \RangeException("name is too large"));
		}

		$this->name = $newName;

	}
// accessor method for age
	public function getAge(): int {
		return ($this->age);
	}
// mutator method for age
	public function setAge(int $newAge) {
		if(empty($newAge) === true) {
			throw (new \InvalidArgumentException("age cannot be empty"));
		}

		if(($newAge) <= 0) {
			throw(new \RangeException("oh no you didn't"));
		} elseif(($newAge) < 18 && ($newAge) > 0) {
			return ("hi caleb");
		} elseif(($newAge > 118)) {
			return ("captain @deepdivedylan");
		} else {
			return $this->age = $newAge;
		}

	}

// to string method for age
	public function __toString() {
		return ($this->age);
	}
}