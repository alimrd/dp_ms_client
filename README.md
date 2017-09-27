# Digipeyk messaging service client 

## client package for digipeyk messaging service

### Installation with Composer
```bash
curl -s http://getcomposer.org/installer | php
php composer.phar require tatdev/dp-ms-client

```

### Usage
with this package you can work with following methods of digipeyk messaging service:
* `sendMessage` send sms with same body to multiple receptors
* `sendMessageMultiple` send sms with multiple body to multiple receptors
* `sendEmail` send email with same body to multiple receptors
* `sendEmailMultiple` send email with multiple body to multiple receptors

### Example

#### `sendMessage`
```php
use \Tatdev\DPMSClient\Clients\Client;
use \Tatdev\DPMSClient\HttpClients\CurlHttpClient;
use \Tatdev\DPMSClient\SendObjects\Value;

$client = new Client(new CurlHttpClient(), 'http://stg.digipeyk.com:8030/api/v1');

$order = $client->sendSms(
    1, // sender id
    ['09109934767'], // array of receptors
    null, // body of message (pass `null` if you use template)
    1, // template id (pass `null` if you use body) 
    [new Value('name','ali')], // array of Value object (pass `[]` if template haven`t variables or using body)
    60, // accept latency to send and check status
    3, // retry count for send
    15, // wait time between every try for check status
    5, // retry count for check status if pending
    'Y/m/d H:i', // jalali date format for schedule sending
    '1396/07/05 16:00', // jalali date for send this message at that time
    false // `true` return order in array format | `false' (default) return order in object format
);
```

#### `sendMessageMultiple`
```php
use \Tatdev\DPMSClient\Clients\Client;
use \Tatdev\DPMSClient\HttpClients\CurlHttpClient;
use \Tatdev\DPMSClient\SendObjects\Value;
use \Tatdev\DPMSClient\SendObjects\SingleMessage;

$client = new Client(new CurlHttpClient(), 'http://stg.digipeyk.com:8030/api/v1');

$order = $client->sendSmsMultiple(
    1, // sender id
    [ // array of SingleMessage object
        new SingleMessage(
            '09109934767', // receptor
            null, // body of message (pass `null` if you use template)
            1, // template id (pass `null` if you use body) 
            [new Value('name', 'ali')] // array of Value object (pass `[]` if template haven`t variables or using body)
        )
    ],
    60, // accept latency to send and check status
    3, // retry count for send
    15, // wait time between every try for check status
    5, // retry count for check status if pending
    'Y/m/d H:i', // jalali date format for schedule sending
    '1396/07/05 16:00', // jalali date for send this message at that time
    false // `true` return order in array format | `false' (default) return order in object format
);
```

#### `sendEmail`
```php
use \Tatdev\DPMSClient\Clients\Client;
use \Tatdev\DPMSClient\HttpClients\CurlHttpClient;
use \Tatdev\DPMSClient\SendObjects\Value;

$client = new Client(new CurlHttpClient(), 'http://stg.digipeyk.com:8030/api/v1');

$order = $client->sendEmail(
    1, // sender id
    ['moradi-ali@outlook.com'], // array of receptors
    'subject', // subject of email
    null, // body of email (pass `null` if you use template)
    1, // template id (pass `null` if you use body) 
    [new Value('name','ali')], // array of Value object (pass `[]` if template haven`t variables or using body)
    ["john@domain.com"], // array of cc
    ["blabla@domain.com"], // array of bcc
    60, // accept latency to send and check status
    3, // retry count for send
    15, // wait time between every try for check status
    5, // retry count for check status if pending
    'Y/m/d H:i', // jalali date format for schedule sending
    '1396/07/05 16:00', // jalali date for send this email at that time
    false // `true` return order in array format | `false' (default) return order in object format
);
```

#### `sendEmailMultiple`
```php
use \Tatdev\DPMSClient\Clients\Client;
use \Tatdev\DPMSClient\HttpClients\CurlHttpClient;
use \Tatdev\DPMSClient\SendObjects\Value;
use \Tatdev\DPMSClient\SendObjects\SingleEmail;

$client = new Client(new CurlHttpClient(), 'http://stg.digipeyk.com:8030/api/v1');

$order = $client->sendEmailMultiple(
    1, // sender id
    [ // array of SingleEmail object
        new SingleEmail(
            'moradi-ali@outlook.com', //receptor
            'subject', // subject of email
            null, // body of email (pass `null` if you use template)
            1, // template id (pass `null` if you use body) 
            [new Value('name', 'ali')], // array of Value object (pass `[]` if template haven`t variables or using body)
            ["john@domain.com"], // array of cc
            ["blabla@domain.com"] // array of bcc
        )
    ],
    60, // accept latency to send and check status
    3, // retry count for send
    15, // wait time between every try for check status
    5, // retry count for check status if pending
    'Y/m/d H:i', // jalali date format for schedule sending
    '1396/07/05 16:00', // jalali date for send this email at that time
    false // `true` return order in array format | `false' (default) return order in object format
);
```