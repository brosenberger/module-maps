<?php
/**
 * @author      Benjamin Rosenberger <rosenberger@e-conomix.at>
 * @package BroCode\Maps\Model\Config\Source
 * @copyright Copyright (c) 2020 E-CONOMIX GmbH (https://www.e-conomix.at)
 * @created 13.04.2020
 */

namespace BroCode\Maps\Model\Config\Source;

use BroCode\Maps\Api\MapServiceInterface;

class MapsProvider implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var MapServiceInterface
     */
    private $mapService;

    /**
     * MapsProvider constructor.
     * @param MapServiceInterface $mapService
     */
    public function __construct(MapServiceInterface $mapService)
    {
        $this->mapService = $mapService;
    }

    /**
     * @inheritDoc
     */
    public function toOptionArray()
    {
        return $this->mapService->toProviderOptionsArray(true);
    }
}
