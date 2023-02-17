Yii2 Flysystem Google Drive
==========================================
Flysystem Google Drive filesystem for Yii2

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require --prefer-dist la-haute-societe/yii2-flysystem-google-drive "^1.0.0"
```

or add

```
"la-haute-societe/yii2-flysystem-google-drive": "^1.0.0"
```

to the require section of your `composer.json` file.

Usage
-----
This extension is a Google Drive Filesystem for Yii2 Flysystem extension by @creocoder.

It uses the [Flysystem Adapter for Google Drive](https://github.com/nao-pon/flysystem-google-drive) by @nao-pon

For usage instructions, see [Yii2 Flysystem documentation](https://github.com/creocoder/yii2-flysystem)

You can get help on how to get clientID, clientSecret and refreshToken [here](https://github.com/ivanvermeyen/laravel-google-drive-demo/blob/master/README.md#create-your-google-drive-api-keys) (Thx @ivanvermeyen)

Configuration
-----------

### Local filesystem

Configure application `components` as follows

```php
return [
    //...
    'components' => [
        //...
        'googleDrive' => [
            'class' =>  lhs\Yii2FlysystemGoogleDrive\GoogleDriveFilesystem::class,
            'clientId'     => 'xxx YOUR CLIENT ID xxx',
            'clientSecret' => 'xxx YOUR CLIENT SECRET xxx',
            'refreshToken' => 'xxx YOUR REFRESH TOKEN xxx',
//             'driveId'     => 'xxx YOUR TEAM DRIVE ID xxx',
            // 'rootFolderId' => 'xxx ROOT FOLDER ID xxx'
        ],
    ],
];
```

You can then access the flysystem API like:
```php
$contents = Yii::$app->googleDrive->listContents();
...
```

