FreadIterator
=============

`SplFileObject` and `SplTempFileObject` is awesome.  
But its iteration mechanism is always line-based.

This library provides 2 classes wraps SPL classes.

* `Yuyat\FreadIterator\File` wraps `SplFileObject`
* `Yuyat\FreadIterator\TempFile` wraps `SplTempFileObject`

Usage
-----

```php
<?php
include __DIR__ . '/vendor/autoload.php';

use Yuyat\FreadIterator\File;
use Yuyat\FreadIterator\TempFile;

const BUFFER_SIZE = 1024 * 16;

$file = new File('image.jpg', 'rb');
$file->setBufferSize(BUFFER_SIZE); // Set buffer length used per-loop

$temp = new TempFile;
$temp->setBufferSize(BUFFER_SIZE);

// Reading from File and writing into TempFile
foreach ($file as $bytes) {
    $temp->fwrite($bytes, strlen($bytes));
}

// Reading from TempFile
foreach ($temp as $bytes) {
    echo $bytes;
}
```

Author
------

Yuya Takeyama
