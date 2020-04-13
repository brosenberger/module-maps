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
use Magento\Framework\Phrase;

/**
 * Interface MapsDataProviderInterface
 * @package BroCode\Maps\Api
 * @api
 */
interface MapsDataProviderInterface
{
    /**
     * @return string
     */
    public function getProviderId();

    /**
     * @return Phrase|String
     */
    public function getProviderLabel();

    /**
     * @param MapsCriteriaInterface
     * @return MapsDataInterface[]
     */
    public function findMapsData($criteria);
}
