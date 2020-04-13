<?php
/**
 * @author      Benjamin Rosenberger <rosenberger@e-conomix.at>
 * @package BroCode\Maps\Api
 * @copyright Copyright (c) 2020 E-CONOMIX GmbH (https://www.e-conomix.at)
 * @created 13.04.2020
 */

namespace BroCode\Maps\Api;

use BroCode\Maps\Api\Data\MapsCriteriaInterface;
use BroCode\Maps\Api\Data\MapsDataInterface;

/**
 * Interface MapServiceInterface
 * @package BroCode\Maps\Api
 * @api
 */
interface MapServiceInterface
{
    /**
     * @param MapsCriteriaInterface $criteria
     * @param string|null $providerId
     * @return MapsDataInterface[]
     */
    public function findMapsData($criteria, $providerId = null);

    /**
     * @return array
     */
    public function toProviderOptionsArray($withEmpty = false);
}
