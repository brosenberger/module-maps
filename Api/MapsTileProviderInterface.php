<?php
/**
 * @author      Benjamin Rosenberger <rosenberger@e-conomix.at>
 * @package BroCode\Maps\Api
 * @copyright Copyright (c) 2020 E-CONOMIX GmbH (https://www.e-conomix.at)
 * @created 19.04.2020
 */

namespace BroCode\Maps\Api;

/**
 * Interface MapsTileProviderInterface
 * @package BroCode\Maps\Api
 */
interface MapsTileProviderInterface
{
    /**
     * @return string
     */
    public function getProviderId();

    /**
     * @return string
     */
    public function getTileUrl();

    /**
     * @return string
     */
    public function getAttribution();
}
