#### UnixTime
PHP Library containing presets and multipliers to generate an amount of time in seconds quickly.

#### Usage
```php
$time = new UnixTime("5m", "x3");
echo $time->time();
$time->echo();
```
Output: `900`

#### Todo
- Create better preset system to allow of any number infront of a valid identifer ie. s for second, m for minute
- Create better multiplier system to allow for multiple mutlipliers in the mutliplier argument.

--- 
This project was designed for use in a cookie handling php library.