<?php
/**
 * @author      Benjamin Rosenberger <rosenberger@e-conomix.at>
 * @package BroCode\Maps\Block
 * @copyright Copyright (c) 2020 E-CONOMIX GmbH (https://www.e-conomix.at)
 * @created 12.04.2020
 */

namespace BroCode\Maps\Block;

use BroCode\Maps\Api\Constants;
use BroCode\Maps\Api\MapServiceInterface;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

/**
 * Class MapWidget
 * @package BroCode\Maps\Block
 */
class MapWidget extends Template implements BlockInterface
{
    protected $_template = 'BroCode_Maps::mapwidget.phtml';
    /**
     * @var MapServiceInterface
     */
    private $mapService;

    /**
     * MapWidget constructor.
     * @param MapServiceInterface $mapService
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(
        MapServiceInterface $mapService,
        Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->mapService = $mapService;
    }

    public function getMapCenterLat()
    {
        return $this->getData('lat') ?: $this->_scopeConfig->getValue(Constants::CONFIG_MAPS_GENERAL_LAT, 'store');
    }
    public function getMapCenterLon()
    {
        return $this->getData('lon') ?: $this->_scopeConfig->getValue(Constants::CONFIG_STORELOCATION_LON, 'store');
    }
    public function getMapZoom()
    {
        return $this->getData('zoom') ?: $this->_scopeConfig->getValue(Constants::CONFIG_MAPS_GENERAL_ZOOM, 'store');
    }
    public function getMapsDataUrl()
    {
        return $this->getUrl('brocodemaps/maps/marker', ['providerId' => $this->getData('mapsProviderId')]);
    }
    public function getTileUrl()
    {
        return $this->mapService->getTileProvider()->getTileUrl();
    }
    public function getTileAttribution()
    {
        return $this->mapService->getTileProvider()->getAttribution();
    }
}
