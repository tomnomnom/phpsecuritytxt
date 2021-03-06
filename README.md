# PHP security.txt parser

Work in progress.

## Install

Install from [packagist](https://packagist.org/packages/tomnomnom/phpsecuritytxt):

```
▶ composer require tomnomnom/phpsecuritytxt
```

## Usage

Parse a `security.txt` file:
```php
<?php
$raw = file_get_contents("test/fixtures/basic.txt");

$sectxt = new \SecurityTxt\Parser($raw);
```

You can create and empty object and call `parse()` instead:

```php
<?php
$raw = file_get_contents("test/fixtures/basic.txt");

$sectxt = new \SecurityTxt\Parser();
$sectxt->parse($raw);
```

Get contact info:
```php
<?php
foreach ($sectxt->contact() as $contact){
    echo "Contact: {$contact}\n";
}
```

Get encryption info:
```php
<?php
foreach ($sectxt->encryption() as $encryption){
    echo "Encryption link: {$encryption}\n";
}
```

Get acknowledgement info:
```php
<?php
foreach ($sectxt->acknowledgement() as $acknowledgement){
    echo "Acknowledgement link: {$acknowledgement}\n";
}
```

Get parser errors:
```php
<?php
foreach ($sectxt->errors() as $error){
    echo "Error: {$error}\n";
}
```

Get comments:
```php
<?php
foreach ($sectxt->comments() as $comment){
    echo "Comment: {$comment}\n";
}
```

## TODO
* Add support for fetching URLs directly
* Improve test coverage
* Set up travis to run tests
