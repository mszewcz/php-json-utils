<?php
/**
 * JSON utils
 *
 * @author      Michal Szewczyk <ms@msworks.pl>
 * @copyright   Michal Szewczyk
 * @license     MIT
 */
declare(strict_types=1);

namespace MS\Json\Utils;


use MS\Json\Utils\Exceptions\DecodingException;
use MS\Json\Utils\Exceptions\EncodingException;

final class Utils
{
    /**
     * Creates JSON string from provided data
     *
     * @param $data
     * @return string
     * @throws EncodingException
     */
    public static function encode($data): string
    {
        $encoded = \json_encode($data, \JSON_UNESCAPED_SLASHES | \JSON_UNESCAPED_UNICODE);
        if (\json_last_error() !== JSON_ERROR_NONE) {
            throw new EncodingException(\json_last_error_msg());
        }
        return $encoded;
    }

    /**
     * Decodes JSON string into an associative array
     *
     * @param string $json
     * @return array
     * @throws DecodingException
     */
    public static function decode(string $json): array
    {
        $decoded = \json_decode($json, true);
        if (\json_last_error() !== JSON_ERROR_NONE) {
            throw new DecodingException(\json_last_error_msg(), \json_last_error());
        }
        return $decoded;
    }

    /**
     * Encodes string to base64url
     *
     * @param string $data
     * @return string
     */
    public static function base64UrlEncode(string $data): string
    {
        return \rtrim(\strtr(\base64_encode($data), '+/', '-_'), '=');
    }

    /**
     * Decodes base64url string
     *
     * @param string $data
     * @return string
     */
    public static function base64UrlDecode(string $data): string
    {
        return \base64_decode(\str_pad(\strtr($data, '-_', '+/'), \strlen($data)%4, '=', \STR_PAD_RIGHT));
    }
}
