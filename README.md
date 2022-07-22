# KirbyGetBrowser

Simply took [this](https://www.php.net/manual/en/function.get-browser.php#101125) really cool function and made it usable for Kirby

## Installation

To install it, simply download this repository and place it inside the plugins folder.

## Usage

As described in the source above you can then use the getBrowser() function and assign it to a variable like this to receive and make use of the browser information.

```
$ua=getBrowser();
$yourbrowser= "Your browser: " . $ua['name'] . " " . $ua['version'] . " on " .$ua['platform'] . " reports: <br >" . $ua['userAgent'];
print_r($yourbrowser);
?>
```
