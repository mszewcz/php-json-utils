<?php
/**
 * JSON utils
 *
 * @author      Michal Szewczyk <ms@msworks.pl>
 * @copyright   Michal Szewczyk
 * @license     MIT
 */
declare(strict_types=1);

use MS\Json\Utils\Utils;
use PHPUnit\Framework\TestCase;

class UtilsTest extends TestCase
{
    public function testEncode()
    {
        $obj = new \stdClass();
        $obj->flt = 5.5;
        $obj->bool = true;

        $data = ['int' => 8, 'str' => 'test/Ʃ', 'arr' => [$obj]];
        $expected = '{"int":8,"str":"test/Ʃ","arr":[{"flt":5.5,"bool":true}]}';
        $this->assertEquals($expected, Utils::encode($data));
    }

    public function testDecode()
    {
        $json = '{"int":8,"str":"test/Ʃ","arr":[{"flt":5.5,"bool":true}]}';
        $expected = ['int' => 8, 'str' => 'test/Ʃ', 'arr' => [0 => ['flt' => 5.5, 'bool' => true]]];

        $this->assertEquals($expected, Utils::decode($json));
    }

    public function testEncodeException()
    {
        $this->expectExceptionMessage('JSON encoding error: Malformed UTF-8 characters, possibly incorrectly encoded');
        $data = "\xB1\x31";
        Utils::encode($data);
    }

    public function testDecodeException()
    {
        $this->expectExceptionMessage('JSON decoding error: Syntax error');
        $this->expectExceptionCode(\JSON_ERROR_SYNTAX);
        $data = '{\'test\':\'1\'}';
        Utils::decode($data);
    }

    public function testBase64Encode()
    {
        $data = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eget purus ';
        $data .= 'consectetur eros pellentesque ullamcorper. Sed justo tellus, porttitor non ';
        $data .= 'porta ac, euismod eu mauris. Nam maximus pretium dapibus. Pellentesque in elit ';
        $data .= 'placerat, sagittis justo id, elementum elit. Maecenas dignissim dui ac lectus ';
        $data .= 'pretium condimentum. Morbi id ipsum in urna egestas varius in vitae quam. ';
        $data .= 'Phasellus efficitur elementum sapien id dictum.';

        $expected = 'TG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFtZXQsIGNvbnNlY3RldHVyIGFkaXBpc2NpbmcgZWxpdC4';
        $expected .= 'gTnVuYyBlZ2V0IHB1cnVzIGNvbnNlY3RldHVyIGVyb3MgcGVsbGVudGVzcXVlIHVsbGFtY29ycG';
        $expected .= 'VyLiBTZWQganVzdG8gdGVsbHVzLCBwb3J0dGl0b3Igbm9uIHBvcnRhIGFjLCBldWlzbW9kIGV1I';
        $expected .= 'G1hdXJpcy4gTmFtIG1heGltdXMgcHJldGl1bSBkYXBpYnVzLiBQZWxsZW50ZXNxdWUgaW4gZWxp';
        $expected .= 'dCBwbGFjZXJhdCwgc2FnaXR0aXMganVzdG8gaWQsIGVsZW1lbnR1bSBlbGl0LiBNYWVjZW5hcyB';
        $expected .= 'kaWduaXNzaW0gZHVpIGFjIGxlY3R1cyBwcmV0aXVtIGNvbmRpbWVudHVtLiBNb3JiaSBpZCBpcH';
        $expected .= 'N1bSBpbiB1cm5hIGVnZXN0YXMgdmFyaXVzIGluIHZpdGFlIHF1YW0uIFBoYXNlbGx1cyBlZmZpY';
        $expected .= '2l0dXIgZWxlbWVudHVtIHNhcGllbiBpZCBkaWN0dW0u';

        $this->assertEquals($expected, Utils::base64UrlEncode($data));
    }

    public function testBase64Decode()
    {
        $data = 'TG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFtZXQsIGNvbnNlY3RldHVyIGFkaXBpc2NpbmcgZWxpdC4';
        $data .= 'gTnVuYyBlZ2V0IHB1cnVzIGNvbnNlY3RldHVyIGVyb3MgcGVsbGVudGVzcXVlIHVsbGFtY29ycG';
        $data .= 'VyLiBTZWQganVzdG8gdGVsbHVzLCBwb3J0dGl0b3Igbm9uIHBvcnRhIGFjLCBldWlzbW9kIGV1I';
        $data .= 'G1hdXJpcy4gTmFtIG1heGltdXMgcHJldGl1bSBkYXBpYnVzLiBQZWxsZW50ZXNxdWUgaW4gZWxp';
        $data .= 'dCBwbGFjZXJhdCwgc2FnaXR0aXMganVzdG8gaWQsIGVsZW1lbnR1bSBlbGl0LiBNYWVjZW5hcyB';
        $data .= 'kaWduaXNzaW0gZHVpIGFjIGxlY3R1cyBwcmV0aXVtIGNvbmRpbWVudHVtLiBNb3JiaSBpZCBpcH';
        $data .= 'N1bSBpbiB1cm5hIGVnZXN0YXMgdmFyaXVzIGluIHZpdGFlIHF1YW0uIFBoYXNlbGx1cyBlZmZpY';
        $data .= '2l0dXIgZWxlbWVudHVtIHNhcGllbiBpZCBkaWN0dW0u';

        $expected = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eget purus ';
        $expected .= 'consectetur eros pellentesque ullamcorper. Sed justo tellus, porttitor non ';
        $expected .= 'porta ac, euismod eu mauris. Nam maximus pretium dapibus. Pellentesque in elit ';
        $expected .= 'placerat, sagittis justo id, elementum elit. Maecenas dignissim dui ac lectus ';
        $expected .= 'pretium condimentum. Morbi id ipsum in urna egestas varius in vitae quam. ';
        $expected .= 'Phasellus efficitur elementum sapien id dictum.';

        $this->assertEquals($expected, Utils::base64UrlDecode($data));
    }
}
