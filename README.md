
# Strawberry IO

  

Input and Output extension for the strawberry framework

  

## Installation

  

1. Download the repository or clone its content

2. Create a folder called `io` inside the `src/foundations` of your strawberry application

3. Move the files inside the `src/` directory of strawberry-io into the new `io` directory.

4. Add the DI Container mappings inside of `src/foundations/di-container/mappings.php`

  

```php
<?php
$mappings = [
	...

	IRequest::class  =>  Request::class,
	IResponse::class  =>  Response::class,
	IFilter::class  =>  ArgumentFilter::class,

	...
];

```

## Usage

```php
public function world(IKernel $kernel) {
	//Get library classes from di container
	$request = $kernel->get('IRequest');
	$response = $kernel->get('IResponse');

	//Take parameter num with filter integer
	//To take strings, remove the second argument (filter)
	$number = $request->fetch('num', 'integer');

	if ($number ==  null) {
		//Send json response, die (jsond) and set status to 400
		$response->jsond([
			'message'  =>  'Please add a a num parameter containing a valid number!'
		], 400);
	}

	//Send a json response without dying containing the input
	$response->json([
		'message'  =>  "You gave us $number"
	]);

}
```

Interfaces:

```php

//Output
function json($data, int $statusCode =  202);
function jsond($data, int $statusCode =  202);
function error(int $statusCode);


//Input
function fetchRequestType();
function fetchData();
function fetch(string $paramName, $filter =  null);
function fetchOrFail(string $paramName, $filter =  null);

// Filters
'integer'
```
