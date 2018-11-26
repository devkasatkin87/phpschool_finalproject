<?php
namespace src\test;
use Datto\JsonRpc\Evaluator;
use Datto\JsonRpc\Exceptions\ArgumentException;
use Datto\JsonRpc\Exceptions\MethodException;

class Calculator implements Evaluator
{

	/**
	 * @param string $method
	 * @param array $arguments
	 * @return mixed
	 */
	public function evaluate($method, $arguments)
	{
		if (count($arguments) !== 2) {
			throw new ArgumentException();
		}

		foreach ($arguments as $argument) {
			if (!is_numeric($argument)) {
				throw new ArgumentException();
			}
		}

		switch ($method) {
			case 'add':
				$result = $this->add(...$arguments);
				break;
			case 'minus':
				$result = $this->minus(...$arguments);
				break;
			default:
				throw new MethodException();
		}
		return $result;
	}

	public function add(int $a, int $b) : int
	{
		return $a + $b;
	}

	public function minus(int $a, int $b) : int
	{
		return $a - $b;
	}
}