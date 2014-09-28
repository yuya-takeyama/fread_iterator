<?php
namespace Yuyat\FileByteIterator;

class TempFile extends \SplTempFileObject
{
    private $bufferSize;

    private $key;

    private $buffer;

    public function __construct($maxMemory = 2097152, $bufferSize = 8192)
    {
        $this->bufferSize = $bufferSize;

        parent::__construct($maxMemory);
    }

    public function setBufferSize($bufferSize)
    {
        $this->bufferSize = $bufferSize;
    }

    public function rewind()
    {
        $this->key = 0;

        $this->fseek(0);
        $this->readBuffer();
    }

    public function next()
    {
        $this->key += 1;

        $this->readBuffer();
    }

    public function key()
    {
        return $this->key;
    }

    public function current()
    {
        return $this->buffer;
    }

    public function valid()
    {
        return $this->buffer !== false && $this->buffer !== '';
    }

    private function readBuffer()
    {
        $this->buffer = $this->fread($this->bufferSize);
    }
}
