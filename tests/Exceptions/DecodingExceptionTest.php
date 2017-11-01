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


use MS\Json\Utils\Exceptions\DecodingException;
use PHPUnit\Framework\TestCase;

class DecodingExceptionTest extends TestCase
{
    public function testExceptionMessage()
    {
        $this->expectExceptionMessage('JSON decoding error: test message');

        throw new DecodingException('test message');
    }
}
