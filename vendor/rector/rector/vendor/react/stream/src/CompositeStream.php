<?php

namespace RectorPrefix20211209\React\Stream;

use RectorPrefix20211209\Evenement\EventEmitter;
final class CompositeStream extends \RectorPrefix20211209\Evenement\EventEmitter implements \RectorPrefix20211209\React\Stream\DuplexStreamInterface
{
    private $readable;
    private $writable;
    private $closed = \false;
    public function __construct(\RectorPrefix20211209\React\Stream\ReadableStreamInterface $readable, \RectorPrefix20211209\React\Stream\WritableStreamInterface $writable)
    {
        $this->readable = $readable;
        $this->writable = $writable;
        if (!$readable->isReadable() || !$writable->isWritable()) {
            $this->close();
            return;
        }
        \RectorPrefix20211209\React\Stream\Util::forwardEvents($this->readable, $this, array('data', 'end', 'error'));
        \RectorPrefix20211209\React\Stream\Util::forwardEvents($this->writable, $this, array('drain', 'error', 'pipe'));
        $this->readable->on('close', array($this, 'close'));
        $this->writable->on('close', array($this, 'close'));
    }
    public function isReadable()
    {
        return $this->readable->isReadable();
    }
    public function pause()
    {
        $this->readable->pause();
    }
    public function resume()
    {
        if (!$this->writable->isWritable()) {
            return;
        }
        $this->readable->resume();
    }
    /**
     * @param \React\Stream\WritableStreamInterface $dest
     * @param mixed[] $options
     */
    public function pipe($dest, $options = array())
    {
        return \RectorPrefix20211209\React\Stream\Util::pipe($this, $dest, $options);
    }
    public function isWritable()
    {
        return $this->writable->isWritable();
    }
    public function write($data)
    {
        return $this->writable->write($data);
    }
    public function end($data = null)
    {
        $this->readable->pause();
        $this->writable->end($data);
    }
    public function close()
    {
        if ($this->closed) {
            return;
        }
        $this->closed = \true;
        $this->readable->close();
        $this->writable->close();
        $this->emit('close');
        $this->removeAllListeners();
    }
}
