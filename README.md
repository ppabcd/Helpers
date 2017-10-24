# String
## How to use?
First time you must include src/Str.php in your project for use this helper. Coming soon i will add this project with composer. For Example code you can see in example folder.
## What i can do?
Here in list.
1. Strip Quotes
2. Random String
### Strip Quotes
You can use this helper for string or multiple data with array.
```php
  $data = 'Test String "';
  Str::strip_quotes($data);
```
### Random String
You can use this helper for random string.
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
