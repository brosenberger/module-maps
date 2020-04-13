<?php
/**
 * @author      Benjamin Rosenberger <rosenberger@e-conomix.at>
 * @package BroCode\Maps\Model\Provider
 * @copyright Copyright (c) 2020 E-CONOMIX GmbH (https://www.e-conomix.at)
 * @created 13.04.2020
 */

namespace BroCode\Maps\Model\Provider;

use BroCode\Maps\Api\Constants;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\StoreManagerInterface;

class AllStoreMapsDataProvider extends MyStoreMapsDataProvider
{
    /**
     * @var StoreManagerInterface
     */
    private $storeManager;

    /**
     * AllStoreMapsDataProvider constructor.
     * @param StoreManagerInterface $storeManager
     * @param ScopeConfigInterface $scopeConfig
     * @param \BroCode\Maps\Api\Data\MapsDataInterfaceFactory $mapsDataFactory
     */
    public function __construct(
        StoreManagerInterface $storeManager,
        ScopeConfigInterface $scopeConfig,
        \BroCode\Maps\Api\Data\MapsDataInterfaceFactory $mapsDataFactory
    ) {
        parent::__construct($scopeConfig, $mapsDataFactory);
        $this->storeManager = $storeManager;
    }

    public function getProviderId()
    {
        return Constants::PROVIDER_ALLSTORES;
    }

    public function getProviderLabel()
    {
        return __('All Stores maps data');
    }

    public function findMapsData($criteria)
    {
        $mapsData = [];
        foreach ($this->storeManager->getStores(true) as $store) {
            $data = $this->createStoreMapData($store->getId());
            if ($data) {
                $mapsData[] = $data;
            }
        }
        return $mapsData;
    }
}
