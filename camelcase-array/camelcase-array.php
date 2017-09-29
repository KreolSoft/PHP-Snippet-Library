class camelcase {
	// Read camelcase and create array
	public static function toArray($input) {
		if(!is_array($input))
			return $input;

		$output = array();
		foreach($input as $key => $value) {
			if(is_array($value))
				$value = self::toArray($value);

			if($key != strtolower($key)) {
				$naming = array_reverse(explode('/', preg_replace_callback('#([A-Z])#s', function($val) {
					return '/'.strtolower($val[1]);
				}, $key)));

				foreach($naming as $name) {
					$value = array(
						$name => $value
					);
				}
			}
			else {
				$value = array($key => $value);
			}
			$output = array_merge_recursive($output, $value);
		}

		return $output;
	}

	// Read array and create camelcase
	public static function fromArray($input, &$output = NULL, $parentName = NULL) {
		if(!$output) {
			$output = array();
			$__return = true;
		}

		if(!is_array($input)) {
			if($parentName) {
				$output[$parentName] = $input;
			}
			else {
				$output = $input;
			}
		}
		else {
			foreach($input as $key => $value) {
				$key = strtolower($key);
				$key = ($parentName ? $parentName.ucfirst($key) : $key);

				if(!is_array($value)) {
					$output[$key] = $value;
				}
				elseif(array_keys($value) === range(0, count($value)-1, 1)) {
					foreach($value as $val)
						$output[$key][] = self::fromArray($val);
				}
				else {
					self::fromArray($value, $output, $key);
				}
			}
		}

		if($__return)
			return $output;
	}
}
