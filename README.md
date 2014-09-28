FreadIterator
=============

`SplFileObject` and `SplTempFileObject` is awesome.
But its iteration mechanism is only line-based.

This library provides 2 classes wraps SPL classes.

* `Yuyat\FreadIterator\File` wraps `SplFileObject`
* `Yuyat\FreadIterator\TempFile` wraps `SplTempFileObject`

Usage
-----

```php
<?php
$bufferSize = 1024 * 16;
$file = new Yuyat\FileByteIterator('image.jpg', 'rb', $bufferSize);
$dest = new SplFileObject('image_copy.png', 'wb');

foreach ($file as $bytes) {
    $dest->fwrite($bytes, strlen($bytes));
}
```

Author
------

Yuya Takeyama
