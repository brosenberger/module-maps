<?php
/**
 * @author      Benjamin Rosenberger <rosenberger@e-conomix.at>
 * @package BroCode\Maps\Api\Data
 * @copyright Copyright (c) 2020 E-CONOMIX GmbH (https://www.e-conomix.at)
 * @created 13.04.2020
 */

namespace BroCode\Maps\Api\Data;

use Magento\Framework\DataObject;

/**
 * Class MapsData
 * @package BroCode\Maps\Api\Data
 */
class MapsData extends DataObject implements MapsDataInterface
{

    /**
     * @inheritDoc
     */
    public function setLat($lat)
    {
        $this->setData(self::FIELD_LAT, $lat);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getLat()
    {
        return $this->getData(self::FIELD_LAT);
    }

    /**
     * @inheritDoc
     */
    public function setLon($lon)
    {
        $this->setData(self::FIELD_LON, $lon);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getLon()
    {
        return $this->getData(self::FIELD_LON);
    }

    /**
     * @inheritDoc
     */
    public function setTitle($title)
    {
        $this->setData(self::FIELD_TITLE, $title);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getTitle()
    {
        return $this->getData(self::FIELD_TITLE);
    }
}
