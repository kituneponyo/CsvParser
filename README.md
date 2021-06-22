# CsvParser
This is an extreme CSV parser made as a joke

<img src="https://github.com/kituneponyo/CsvParser/blob/main/dirtycsv.png">

<img src="https://github.com/kituneponyo/CsvParser/blob/main/dirtycsvtest.png">

# Feature

support MS-Excel CSV format

# Usage
```
require_once('CsvParser.php');
$csvParser = new CsvParser();
$csvParser->load("dirty.csv");
$rows = $csvParser->getRows();
```

# Demos

run test.php

# Notes

By the way, I recommend you to use fgetcsv.

# Author

https://twitter.com/kituneponyo
https://meow.fan/k

# License

CC0
