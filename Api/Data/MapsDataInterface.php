<?php
/**
 * @author      Benjamin Rosenberger <rosenberger@e-conomix.at>
 * @package BroCode\Maps\Api\Data
 * @copyright Copyright (c) 2020 E-CONOMIX GmbH (https://www.e-conomix.at)
 * @created 13.04.2020
 */

namespace BroCode\Maps\Api\Data;

/**
 * Interface MapsDataInterface
 * @package BroCode\Maps\Api\Data
 * @api
 */
interface MapsDataInterface
{
    const FIELD_LAT = 'lat';
    const FIELD_LON = 'lon';
    const FIELD_TITLE = 'title';

    /**
     * @param float $lat
     * @return $this
     */
    public function setLat($lat);

    /**
     * @return float
     */
    public function getLat();

    /**
     * @param float $lon
     * @return $this
     */
    public function setLon($lon);

    /**
     * @return float
     */
    public function getLon();

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title);

    /**
     * @return string
     */
    public function getTitle();
}
