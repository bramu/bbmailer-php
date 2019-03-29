BBMailer PHP client
============

BBMailer PHP client is using cURL on top on our Rest API. Here's how to use it:

```php
require_once('PATH/TO/FILE/bbmailer.php');

$bbm = new BBMailer("YOUR_AUTH_TOKEN");

$bbm->send_email("template_name", "to_address", $data_mapping);
$bbm->send_event("event_name", "to_address", $event_properties);
```
