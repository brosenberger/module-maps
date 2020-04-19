<?php
/**
 * @author      Benjamin Rosenberger <rosenberger@e-conomix.at>
 * @package BroCode\Maps\Model\TileProvider
 * @copyright Copyright (c) 2020 E-CONOMIX GmbH (https://www.e-conomix.at)
 * @created 19.04.2020
 */

namespace BroCode\Maps\Model\TileProvider;


use BroCode\Maps\Api\MapsTileProviderInterface;

/**
 * Class OpenStreetMapTileProvider
 * @package BroCode\Maps\Model\TileProvider
 */
class OpenStreetMapTileProvider implements MapsTileProviderInterface
{

    /**
     * @inheritDoc
     */
    public function getProviderId()
    {
        return 'openStreetMap';
    }

    /**
     * @inheritDoc
     */
    public function getTileUrl()
    {
        return 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
    }

    /**
     * @inheritDoc
     */
    public function getAttribution()
    {
        return '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors';
    }
}
