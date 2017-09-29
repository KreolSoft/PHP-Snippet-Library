# Camel Case Converter
A simple script to convert camel case assigned arrays into multidimensional arrays and vise versa.


## Getting Started

Include the camelcase-arrays.php into your code:

	require_once('camelcase-array.php');
	
Call the functions as you need them;

Convert camel case into multidimensional array:

	$value = array(
		'aCamelCaseValue1' => 'nr1',
		'aCamelCaseValue2' => 'nr2'
	);
	$value = \camelcase::toArray(array $value);		// To convert a camelcase array into a multidimensional array
	
	
	var_dump($value);
	---------------------------------------------
	array(1) {
		["a"] => array(1) {
			["camel"] => array(1) {
				["case"] => array(2) {
					["value1"] => string(3) "nr1"
					["value2"] => string(3) "nr2"
				}
			}
		}
	}


And convert a multidimensional array into camel case:

	$value = array(
		'a' => array(
			'camel' => array(
				'case' => array(
					'value1' => 'nr1',
					'value2' => 'nr2'
				)
			)
		)
	);
	$value = \camelcase::fromArray(array $value);		// To convert a camelcase array into a multidimensional array
	
	
	var_dump($value);
	---------------------------------------------
	array(2) {
		["caseValue1"] => string(3) "nr1"
  		["caseValue2"] => string(3) "nr2"
	}

## Authors

* **Nikita Nitichevski** - *Initial work* - [donnikitos](http://donnikitos.com)


## License

This project is licensed under the MIT License - see the [../LICENSE.md](LICENSE.md) file for details
