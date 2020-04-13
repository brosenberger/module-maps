<?php
/**
 * @author      Benjamin Rosenberger <rosenberger@e-conomix.at>
 * @package BroCode\Maps\Model\Provider
 * @copyright Copyright (c) 2020 E-CONOMIX GmbH (https://www.e-conomix.at)
 * @created 13.04.2020
 */

namespace BroCode\Maps\Model\Provider;

use BroCode\Maps\Api\Constants;
use BroCode\Maps\Api\MapsDataProviderInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Class MyStoreMapsDataProvider
 * @package BroCode\Maps\Model\Provider
 */
class MyStoreMapsDataProvider implements MapsDataProviderInterface
{
    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;
    /**
     * @var \BroCode\Maps\Api\Data\MapsDataInterfaceFactory
     */
    protected $mapsDataFactory;

    /**
     * MyStoreMapsDataProvider constructor.
     * @param ScopeConfigInterface $scopeConfig
     * @param \BroCode\Maps\Api\Data\MapsDataInterfaceFactory $mapsDataFactory
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        \BroCode\Maps\Api\Data\MapsDataInterfaceFactory $mapsDataFactory
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->mapsDataFactory = $mapsDataFactory;
    }

    /**
     * @inheritDoc
     */
    public function getProviderId()
    {
        return Constants::PROVIDER_MYSTORE;
    }

    /**
     * @inheritDoc
     */
    public function getProviderLabel()
    {
        return __('My store maps data');
    }

    /**
     * @inheritDoc
     */
    public function findMapsData($criteria)
    {
        $mapsData = [];
        $data = $this->createStoreMapData();
        if ($data) {
            $mapsData[] = $data;
        }
        return $mapsData;
    }

    protected function createStoreMapData($storeId = null)
    {
        $lat = $this->scopeConfig->getValue(Constants::CONFIG_STORELOCATION_LAT, 'stores', $storeId);
        $lon = $this->scopeConfig->getValue(Constants::CONFIG_STORELOCATION_LON, 'stores', $storeId);
        if ($lat!==null && $lon!==null) {
            /* @var \BroCode\Maps\Api\Data\MapsDataInterface $data */
            $data = $this->mapsDataFactory->create();
            return $data->setLat($lat)
                ->setLon($lon)
                ->setTitle($this->scopeConfig->getValue('general/store_information/name', 'stores', $storeId));
        }
        return null;
    }
}
