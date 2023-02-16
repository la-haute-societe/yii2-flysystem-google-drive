<?php
/**
 * @link http://www.lahautesociete.com
 * @copyright Copyright (c) 2017 La Haute Société
 */

namespace lhs\Yii2FlysystemGoogleDrive;

use creocoder\flysystem\Filesystem;
use Google_Client;
use Google_Service_Drive;
use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;
use League\Flysystem\AdapterInterface;
use yii\base\InvalidConfigException;

/**
 * GoogleDriveFilesystem class
 *
 * @author albanjubert
 **/
class GoogleDriveFilesystem extends Filesystem
{
    public $clientId;
    public $clientSecret;
    public $refreshToken;
    public $rootFolderId;
    public $driveId;

    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->clientId === null) {
            throw new InvalidConfigException('The "clientId" property must be set.');
        }

        if ($this->clientSecret === null) {
            throw new InvalidConfigException('The "clientSecret" property must be set.');
        }

        if ($this->refreshToken === null) {
            throw new InvalidConfigException('The "refreshToken" property must be set.');
        }

        parent::init();
    }

    /**
     * @return AdapterInterface
     */
    protected function prepareAdapter()
    {
        $client = new Google_Client();
        $client->setClientId($this->clientId);
        $client->setClientSecret($this->clientSecret);
        $client->refreshToken($this->refreshToken);
        $service = new Google_Service_Drive($client);

        $options = [];
        if (isset($this->driveId)) {
            $options['teamDriveId'] = $this->driveId;
        }

        return new GoogleDriveAdapter($service, $this->rootFolderId, $options);
    }
}
