<?php
/**
 * @author      Benjamin Rosenberger <rosenberger@e-conomix.at>
 * @package BroCode\Maps\Model
 * @copyright Copyright (c) 2020 E-CONOMIX GmbH (https://www.e-conomix.at)
 * @created 13.04.2020
 */

namespace BroCode\Maps\Model;

use BroCode\Maps\Api\MapsDataProviderInterface;
use BroCode\Maps\Api\MapServiceInterface;

class MapsService implements MapServiceInterface
{
    /**
     * @var MapsDataProviderInterface[]
     */
    private $mapsDataProvider;

    /**
     * MapsService constructor.
     * @param MapsDataProviderInterface[]|array $mapsDataProvider
     */
    public function __construct(
        $mapsDataProvider = []
    ) {
        foreach ($mapsDataProvider as $provider) {
            $this->mapsDataProvider[$provider->getProviderId()] = $provider;
        }
    }

    /**
     * @inheritDoc
     */
    public function findMapsData($criteria, $providerId = null)
    {
        // TODO add caching of results per criteria and providerId

        if (isset($this->mapsDataProvider[$providerId])) {
            return $this->mapsDataProvider[$providerId]->findMapsData($criteria);
        }
        return [];
    }

    public function toProviderOptionsArray($withEmpty = false)
    {
        $providerOptions = [];
        if ($withEmpty) {
            $providerOptions[] = ['value'=>null,'label'=>__('--Please Select--')];
        }
        foreach ($this->mapsDataProvider as $providerId => $provider) {
            $providerOptions[] = ['value'=>$providerId,'label'=>$provider->getProviderLabel()];
        }
        return $providerOptions;
    }


}
