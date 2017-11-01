# php-json-utils
JSON utility class, which provides encoding, decoding, base64url encoding and base64url decoding methods.

[![Build Status](https://travis-ci.com/mszewcz/php-json-utils.svg?token=SKHyUu7D9k2gxfy5aKpX&branch=develop)](https://travis-ci.com/mszewcz/php-json-utils)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/90ce8609235f4ef2898aa3b23a655a8e)](https://www.codacy.com?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=mszewcz/php-json-utils&amp;utm_campaign=Badge_Grade)
[![Codacy Badge](https://api.codacy.com/project/badge/Coverage/90ce8609235f4ef2898aa3b23a655a8e)](https://www.codacy.com?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=mszewcz/php-json-utils&amp;utm_campaign=Badge_Coverage)

## Contents
* [Installation](#Installation)
* [Usage](#Usage)
* [Contributing](#Contributing)
* [License](#License)


<a name="Installation"></a>
## Installation
If you use [Composer][composer] to manage the dependencies simply add a dependency on ```mszewcz/php-json-utils``` to 
your project's composer.json file. Here is a minimal example of a composer.json:
```
{
    "require": {
        "mszewcz/php-json-utils": ">=1.0"
    }
}
```
You can also clone or download this respository.

**php-json-utils** meets [PSR-4][psr4] autoloading standards. If using the Composer please include its autoloader file:
```php
require_once 'vendor/autoload.php';
```
If you cloned or downloaded this repository, you will have to code your own PSR-4 style autoloader implementation.

<a name="Usage"></a>
## Usage
To encode data into JSON string:
```php
use MS\Json\Utils\Utils;

$obj = new \stdClass();
$obj->flt = 5.5;
$obj->bool = true;

$data = ['int' => 8, 'str' => 'test/Ʃ', 'arr' => [$obj]];

$utils = new Utils();
try {
    $encoded = $utils->encode($data);
} catch (\Exception $e) {
    echo $e->getMessage();
}   
```

To decode JSON string:
```php
use MS\Json\Utils\Utils;

$json = '{"int":8,"str":"test/Ʃ","arr":[{"flt":5.5,"bool":true}]}';

$utils = new Utils();
try {
    $decoded = $utils->decode($json);
} catch (\Exception $e) {
    echo $e->getMessage();
}   
*/
```

To base64url encode string:
```php
use MS\Json\Utils\Utils;

$data = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eget purus ';
$data.= 'consectetur eros pellentesque ullamcorper. Sed justo tellus, porttitor non ';
$data.= 'porta ac, euismod eu mauris. Nam maximus pretium dapibus. Pellentesque in elit ';
$data.= 'placerat, sagittis justo id, elementum elit. Maecenas dignissim dui ac lectus ';
$data.= 'pretium condimentum. Morbi id ipsum in urna egestas varius in vitae quam. ';
$data.= 'Phasellus efficitur elementum sapien id dictum.';

$utils = new Utils();
$encoded = $utils->base64UrlEncode($data);
```

To base64url decode string:
```php
use MS\Json\Utils\Utils;

$data = 'TG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFtZXQsIGNvbnNlY3RldHVyIGFkaXBpc2NpbmcgZWxpdC4';
$data.= 'gTnVuYyBlZ2V0IHB1cnVzIGNvbnNlY3RldHVyIGVyb3MgcGVsbGVudGVzcXVlIHVsbGFtY29ycG';
$data.= 'VyLiBTZWQganVzdG8gdGVsbHVzLCBwb3J0dGl0b3Igbm9uIHBvcnRhIGFjLCBldWlzbW9kIGV1I';
$data.= 'G1hdXJpcy4gTmFtIG1heGltdXMgcHJldGl1bSBkYXBpYnVzLiBQZWxsZW50ZXNxdWUgaW4gZWxp';
$data.= 'dCBwbGFjZXJhdCwgc2FnaXR0aXMganVzdG8gaWQsIGVsZW1lbnR1bSBlbGl0LiBNYWVjZW5hcyB';
$data.= 'kaWduaXNzaW0gZHVpIGFjIGxlY3R1cyBwcmV0aXVtIGNvbmRpbWVudHVtLiBNb3JiaSBpZCBpcH';
$data.= 'N1bSBpbiB1cm5hIGVnZXN0YXMgdmFyaXVzIGluIHZpdGFlIHF1YW0uIFBoYXNlbGx1cyBlZmZpY';
$data.= '2l0dXIgZWxlbWVudHVtIHNhcGllbiBpZCBkaWN0dW0u';

$utils = new Utils();
$decoded = $utils->base64UrlDecode($data);
```

<a name="Contributing"></a>
## Contributing
Contributions are welcome. Please send your contributions through GitHub pull requests 

Pull requests for bug fixes must be based on latest stable release from the ```master``` branch whereas pull requests for new features must be based on the ```developer``` branch.

Due to time constraints, we are not always able to respond as quickly as we would like. If you feel you're waiting too long for merging your pull request please remind us here.

#### Coding standards
We follow [PSR-2][psr2] coding style and [PSR-4][psr4] autoloading standards. Be sure you're also following them before sending us your pull request.


<a name="License"></a>
## License
**php-json-utils** is licensed under the MIT License - see the ```LICENSE``` file for details.

[composer]:http://getcomposer.org/
[psr2]:http://www.php-fig.org/psr/psr-2/
[psr4]:http://www.php-fig.org/psr/psr-4/
