<?php
/**
 * JSON utils
 *
 * @author      Michal Szewczyk <ms@msworks.pl>
 * @copyright   Michal Szewczyk
 * @license     MIT
 */
declare(strict_types=1);

namespace MS\Json\Utils\Exceptions;


use Throwable;

class EncodingException extends \Exception
{
    /**
     * EncodingException constructor.
     *
     * @param string         $message
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct($message = '', $code = 0, Throwable $previous = null)
    {
        $message = \sprintf('JSON encoding error: %s', $message);
        parent::__construct($message, $code, $previous);
    }
}
