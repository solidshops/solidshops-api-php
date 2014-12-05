#SolidShops PHP API client


A SolidShops API client for PHP created and maintained by @SolidShops


##Installation
You can [download the latest version](http://github.com/solidshops/solidshops-api-php/zipball/master) or use composer:

```json
{
	"require": {
		"solidshops/solidshops-api-php": "dev-master"
	}
}
```


##Authorisation
You can create an authentication object once and pass it to the constructor of each class.

```php

$obj_auth = new \SolidShopsApi\Http\Auth\BasicAuthentication ( "apikey", "apipassword" );

$obj_products = new \SolidShopsApi\Services\Products ( $obj_auth );
$obj_pages = new \SolidShopsApi\Services\Pages ( $obj_auth );
$obj_orders = new \SolidShopsApi\Services\Orders ( $obj_auth );
$obj_categories = new \SolidShopsApi\Services\Categories ( $obj_auth );

```


##Methods

###Pages

#####getlist

```php

$obj_jsonresponse = $obj_pages->getlist ( $arr_filter );
if ($obj_jsonresponse->getSuccess ()) {
	var_dump($obj_jsonresponse->getData ());
} else {
	var_dump($obj_jsonresponse->getErrors ());
}
```

#####get

```php

$obj_jsonresponse = $obj_pages->get ( 1 );
if ($obj_jsonresponse->getSuccess ()) {
	var_dump($obj_jsonresponse->getData ());
} else {
	var_dump($obj_jsonresponse->getErrors ());
}
```

#####create

```php

$obj_jsonresponse = $obj_pages->create ( '{
	"name": "a page name",
	"content": "the first content of the page",
	"active": 1
}' );
if ($obj_jsonresponse->getSuccess ()) {
	var_dump($obj_jsonresponse->getData ());
} else {
	var_dump($obj_jsonresponse->getErrors ());
}
```

#####update

```php

$obj_jsonresponse = $obj_pages->update ( $id_to_update, '{
	"name": "a page name",
	"content": "the second content of the page",
	"active": 1
}' );
if ($obj_jsonresponse->getSuccess ()) {
	var_dump($obj_jsonresponse->getData ());
} else {
	var_dump($obj_jsonresponse->getErrors ());
}
```

#####delete

```php

$obj_jsonresponse = $obj_pages->delete ( 1 );
if ($obj_jsonresponse->getSuccess ()) {
	var_dump($obj_jsonresponse->getData ());
} else {
	var_dump($obj_jsonresponse->getErrors ());
}
```

###Products

#####getlist

```php

$obj_jsonresponse = $obj_products->getlist ( $arr_filter );
if ($obj_jsonresponse->getSuccess ()) {
	var_dump($obj_jsonresponse->getData ());
} else {
	var_dump($obj_jsonresponse->getErrors ());
}
```

#####get

```php

$obj_jsonresponse = $obj_products->get ( 1 );
if ($obj_jsonresponse->getSuccess ()) {
	var_dump($obj_jsonresponse->getData ());
} else {
	var_dump($obj_jsonresponse->getErrors ());
}
```

###Orders

#####getlist

```php

$obj_jsonresponse = $obj_orders->getlist ( $arr_filter );
if ($obj_jsonresponse->getSuccess ()) {
	var_dump($obj_jsonresponse->getData ());
} else {
	var_dump($obj_jsonresponse->getErrors ());
}
```

#####get

```php

$obj_jsonresponse = $obj_orders->get ( 1 );
if ($obj_jsonresponse->getSuccess ()) {
	var_dump($obj_jsonresponse->getData ());
} else {
	var_dump($obj_jsonresponse->getErrors ());
}
```

###Categories

#####getlist

```php

$obj_jsonresponse = $obj_categories->getlist ( $arr_filter );
if ($obj_jsonresponse->getSuccess ()) {
	var_dump($obj_jsonresponse->getData ());
} else {
	var_dump($obj_jsonresponse->getErrors ());
}
```

#####get

```php

$obj_jsonresponse = $obj_categories->get ( 1 );
if ($obj_jsonresponse->getSuccess ()) {
	var_dump($obj_jsonresponse->getData ());
} else {
	var_dump($obj_jsonresponse->getErrors ());
}
```

###Pages

#####getlist

```php

$obj_jsonresponse = $obj_pages->getlist ( $arr_filter );
if ($obj_jsonresponse->getSuccess ()) {
	var_dump($obj_jsonresponse->getData ());
} else {
	var_dump($obj_jsonresponse->getErrors ());
}
```

#####get

```php

$obj_jsonresponse = $obj_pages->get ( 1 );
if ($obj_jsonresponse->getSuccess ()) {
	var_dump($obj_jsonresponse->getData ());
} else {
	var_dump($obj_jsonresponse->getErrors ());
}
```

#####create

```php

$obj_jsonresponse = $obj_pages->create ( '{
	"name": "a page name",
	"content": "the first content of the page",
	"active": 1
}' );
if ($obj_jsonresponse->getSuccess ()) {
	var_dump($obj_jsonresponse->getData ());
} else {
	var_dump($obj_jsonresponse->getErrors ());
}
```

#####update

```php

$obj_jsonresponse = $obj_pages->update ( $id_to_update, '{
	"name": "a page name",
	"content": "the second content of the page",
	"active": 1
}' );
if ($obj_jsonresponse->getSuccess ()) {
	var_dump($obj_jsonresponse->getData ());
} else {
	var_dump($obj_jsonresponse->getErrors ());
}
```

#####delete

```php

$obj_jsonresponse = $obj_pages->delete ( 1 );
if ($obj_jsonresponse->getSuccess ()) {
	var_dump($obj_jsonresponse->getData ());
} else {
	var_dump($obj_jsonresponse->getErrors ());
}
```
