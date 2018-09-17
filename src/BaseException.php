<?php
namespace Rswork\Component\Exception;

use \Exception as RootException;
use Throwable;

/**
 * Class BaseException
 * @package Rswork\Component\Exception
 *
 * @author Rivsen
 */
class BaseException extends RootException
{
    protected $data;

    public function __construct($message = "", $code = 0, Throwable $previous = null, $data = null)
    {
        $this->data = $data;

        parent::__construct($message, $code, $previous);
    }

    public function getData()
    {
        return $this->data;
    }

    public function __toString()
    {
        $string = '';

        if ($this->data) {
            $string .= '[code: '.$this->getCode().', data: '.json_encode($this->data).']';
        }

        $string .= parent::__toString();

        return $string;
    }
}
