<?php
/**
 * JSON utils
 *
 * @author      Michal Szewczyk <ms@msworks.pl>
 * @copyright   Michal Szewczyk
 * @license     MIT
 */
declare(strict_types=1);

namespace Exceptions;


use MS\Json\Utils\Exceptions\EncodingException;
use PHPUnit\Framework\TestCase;

class EncodingExceptionTest extends TestCase
{
    public function testExceptionMessage()
    {
        $this->expectExceptionMessage('JSON encoding error: test message');

        throw new EncodingException('test message');
    }
}
