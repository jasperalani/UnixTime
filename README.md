#### UnixTime
PHP Library containing presets and multipliers to generate an amount of time in seconds quickly.
###### Version 1.0.2
#### Usage

It's as easy as `new UnixTime('5m');`

```php
echo new UnixTime("5m"); // five minutes: 300

$time = new UnixTime('5m', 'x3'); // fifteen minutes: 900
$time = new UnixTime('three_years', 'x2');

echo $time->time(); // time() function returns the time
$time->time(true); // specify echo argument to echo the time
echo $time->format(); // format() functions returns the current time + preset time
```


#### Todo
- Create better preset system to allow of any number infront of a valid identifer ie. s for second, m for minute
- Create better multiplier system to allow for multiple mutlipliers as arguments.

--- 
This project was designed for use in a cookie handling php library.
