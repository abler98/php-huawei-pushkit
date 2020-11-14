# HUAWEI Push Kit SDK for PHP

[![Latest Stable Version](https://poser.pugx.org/megakit/php-huawei-pushkit/v)](//packagist.org/packages/megakit/php-huawei-pushkit)
[![Total Downloads](https://poser.pugx.org/megakit/php-huawei-pushkit/downloads)](//packagist.org/packages/megakit/php-huawei-pushkit)
[![Latest Unstable Version](https://poser.pugx.org/megakit/php-huawei-pushkit/v/unstable)](//packagist.org/packages/megakit/php-huawei-pushkit)
[![License](https://poser.pugx.org/megakit/php-huawei-pushkit/license)](//packagist.org/packages/megakit/php-huawei-pushkit)

Simple SDK for HUAWEI Push Kit server.

## Installation

Use [Composer] to install the package:

```shell script
$ composer require megakit/php-huawei-pushkit
```

## Quickstart example

```php
<?php

use MegaKit\Huawei\PushKit\Data\Destination\TokenDestination;
use MegaKit\Huawei\PushKit\Data\Message\Android\AndroidClickAction;
use MegaKit\Huawei\PushKit\DataBuilder\Message\Android\AndroidClickActionBuilder;
use MegaKit\Huawei\PushKit\DataBuilder\Message\Android\AndroidConfigBuilder;
use MegaKit\Huawei\PushKit\DataBuilder\Message\Android\AndroidNotificationBuilder;
use MegaKit\Huawei\PushKit\DataBuilder\Message\MessageBuilder;
use MegaKit\Huawei\PushKit\DataBuilder\Message\NotificationBuilder;
use MegaKit\Huawei\PushKit\Exceptions\HuaweiException;
use MegaKit\Huawei\PushKit\Factory\SenderFactory;
use MegaKit\Huawei\PushKit\HttpConfigBuilder;
use MegaKit\Huawei\PushKit\HuaweiConfigBuilder;

$config = [
    'app_id' => '<APP_ID>',
    'oauth_client_id' => '<OAUTH_CLIENT_ID>',
    'oauth_client_secret' => '<OAUTH_CLIENT_SECRET>',
];

$tokens = [
    '<PUSH_TOKEN_OF_TARGET_USER>',
];

$huaweiConfig = HuaweiConfigBuilder::withDefaults()
    ->setAppId($config['app_id'])
    ->setOAuthCredentials($config['oauth_client_id'], $config['oauth_client_secret'])
    ->build();

$httpConfig = HttpConfigBuilder::withDefaults()->build();

$senderFactory = new SenderFactory();
$sender = $senderFactory->createSenderWithConfig($huaweiConfig, $httpConfig);

$notification = NotificationBuilder::make()
    ->setTitle('Hello')
    ->setBody('World')
    ->build();

$androidNotification = AndroidNotificationBuilder::make()
    ->setClickAction(
        AndroidClickActionBuilder::make()
            ->setType(AndroidClickAction::TYPE_START_APP)
            ->build()
    )
    ->build();

$androidConfig = AndroidConfigBuilder::make()
    ->setNotification($androidNotification)
    ->build();

$message = MessageBuilder::make()
    ->setNotification($notification)
    ->setAndroid($androidConfig)
    ->setData(['hello' => 'world'])
    ->build();

$destination = new TokenDestination($tokens);

try {
    $sender->sendMessage($message, $destination);
    echo 'Message sent successfully' . PHP_EOL;
} catch (HuaweiException $e) {
    echo 'Error sending message: ' . $e->getMessage() . ' (' . $e->getCode() . ')' . PHP_EOL;
}
```

License
-------

All contents of this package are licensed under the [MIT license].

[Composer]: https://getcomposer.org
[MIT license]: LICENSE
