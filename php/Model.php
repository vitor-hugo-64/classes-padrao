<?php

	namespace NAMESPACE_DO_PROJETO;

	abstract class Model {

		public function __call( $nameFunction, $argsFunction)
		{
			$methodType = substr( $nameFunction, 0, 3);
			$fieldName = lcfirst(substr( $nameFunction, 3, strlen($nameFunction)));

			switch ($methodType) {
				case 'get':
					return $this->{$fieldName};
					break;
				
				case 'set':
					$this->{$fieldName} = $argsFunction[0];
					break;
			}
		}

		public function setData($data = array())
		{
			foreach ($data as $key => $value) {
				$this->{"set".$key}($value);
			}
		}

		public function getDatas()
		{
			return $this;
		}
	}