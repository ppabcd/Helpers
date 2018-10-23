# Helpers
## String Helpers
### How to use?
First time you must include src/Str.php in your project for use this helper. Coming soon i will add this project with composer. For Example code you can see in example folder.

### How to use Helpers?
there is many types of uses. they are mention below.

#### 1. Strip Quotes
You can use strip Quotes helper for string or multiple data with array.
```php
  $data = 'Test String "';
  Str::strip_quotes($data);
```

#### 2. Strip Slashes
You can use Strip Slashes helper for string or multiple data with array.
```php
  $data = 'Test String \' ';
  Str::strip_slashes($data);
```

#### 3. Random String
You can use Random String helper for random string in data.
Here in list.
1. **alnum** for Alphanumeric
2. **alpha** for Alphabet
3. **numeric** for Numeric
4. **md5** for MD5
5. **hex** for Hex
6. **binary** for Binary text

```php
  Str::random(); // Default is alnum
  Str::random(18,'alnum'); //Alnum result
  Str::random(18,'alpha'); //Alpha result
  Str::random(18,'numeric'); //Numeric result
  Str::random(18,'md5'); //MD5 result
  Str::random(18,'hex'); //Hex result
  Str::random(18,'binary'); //Binary result
```

#### 4. Alternator
You can use Alternator helper for alternating.

```php
  for ($i = 0; $i < 10; $i++)
      {
        echo Str::alternator('one', 'two', 'three', 'four', 'five');
      }
```

#### 5. Reverse Case
You can use this helper to reverse the case of each letter in a string.
 ```php
    $data = 'tESt stRinG';
    Str::reverse_case($data);
    // Test String
```

#### 6. Title Case
You can use Title Case helper for making a string or array of strings title case.

```php
    $data = 'test strinG';
    Str::title_case($data);
    // Test String
```
 
#### 7. Limit
You can use Limit helper to limit a string or array of strings up to specified length.


```php
    $data = 'test string';
    Str::limit($data, 4);
    // test
```

#### 8. Contains
You can use Contains helper to check if specific word or key exists in a string.

```php
    $data = 'test string';
    Str::contains($data, 'test');
    // true
```
#### 9. Camelize
You can use Camelize helper to camelize a string.

```php
    $data = 'example_test-string';
    Str::camelize($data);
    // ExampleTestString
```

#### 10. Array key starts with
You can use Array key starts with helper to find an array key that starts with a given term

```php
    $array = [
      'pizza pie' => 'nomnom',
      'hot dog' => 'ohnomnom'
    ];
    
    Str::array_key_starts_with($array, 'hot');
    // ['hot dog' => 'ohnomnom']
```

#### 11. Array key ends with
You can use Array key ends with helper to find an array key that ends with a given term

```php
    $array = [
      'pizza pie' => 'nomnom',
      'hot dog' => 'ohnomnom'
    ];
    
    Str::array_key_ends_with($array, 'pie');
    // ['pizza pie' => 'nomnom']
```

#### 12. Arrays are identical
Determine if two arrays are identical with the same index values ignoring key ordering

```php
    $array = [
      'foo' => 'bar'
    ];
    
    Str::arrays_match($array, $array);
    // true
```

#### 13. Snake case
Return snake case format of the given string

```php
    $string = 'heLLo World ya`ll';
    
    Str::snake_case($string));
    // hello_world_ya`ll
    # With delimiter
    Str::snake_case($string, '-'));
    // hello-world-ya`ll
```

#### 13. Lower case
Return lower case of the given string. Works with UTF-8

```php
    $string = 'Hello WorLD';
    
    Str::lower_case($string));
    // hello world
```

#### 13. Upper case
Return upper case of the given string. Works with UTF-8

```php
    $string = 'Hello WorLD';
    
    Str::upper_case($string));
    // HELLO WORLD
```

## Contributing

See also the list of [contributors](CONTRIBUTING.md) who participated in this project.

