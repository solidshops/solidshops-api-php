#SolidShops PHP API client


A SolidShops API client for PHP created and maintained by @SolidShops


##Installation
You can [download the latest version](http://github.com/solidshops/solidshops-api-php/zipball/master) or use composer:

```json
{
	"require": {
		"olidshops/solidshops-api-php": "dev-master"
	}
}
```


##Authorisation

```php

$obj_auth = new \SolidShopsApi\Http\Auth\BasicAuthentication ( "apikey", "apipassword" );
$obj_products = new \SolidShopsApi\Services\Products ( $obj_auth );
$obj_pages = new \SolidShopsApi\Services\Pages ( $obj_auth );

```


##Methods


###Products
#####get

```php

$obj_auth = new \SolidShopsApi\Http\Auth\BasicAuthentication ( "apikey", "apipassword" );
$obj_pages = new \SolidShopsApi\Services\Pages ( $obj_auth );

```