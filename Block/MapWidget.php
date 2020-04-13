<?php
/**
 * @author      Benjamin Rosenberger <rosenberger@e-conomix.at>
 * @package BroCode\Maps\Block
 * @copyright Copyright (c) 2020 E-CONOMIX GmbH (https://www.e-conomix.at)
 * @created 12.04.2020
 */

namespace BroCode\Maps\Block;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

/**
 * Class MapWidget
 * @package BroCode\Maps\Block
 */
class MapWidget extends Template implements BlockInterface
{
    protected $_template = 'BroCode_Maps::mapwidget.phtml';

    public function getMapCenterLat()
    {
        return $this->getData('lat');
    }
    public function getMapCenterLon()
    {
        return $this->getData('lon');
    }
    public function getMapZoom()
    {
        return $this->getData('zoom');
    }
    public function getMapsDataUrl()
    {
        return $this->getUrl('brocodemaps/maps/marker', ['providerId' => $this->getData('mapsProviderId')]);
    }
}
