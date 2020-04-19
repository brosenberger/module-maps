<?php
/**
 * @author      Benjamin Rosenberger <rosenberger@e-conomix.at>
 * @package BroCode\Maps\Api
 * @copyright Copyright (c) 2020 E-CONOMIX GmbH (https://www.e-conomix.at)
 * @created 13.04.2020
 */

namespace BroCode\Maps\Api;

/**
 * Class Constants
 * @package BroCode\Maps\Api
 */
class Constants
{

    const CONFIG_MAPS_GENERAL_ZOOM = 'brocode_maps/general/zoom';
    const CONFIG_MAPS_GENERAL_LAT = 'brocode_maps/general/lat';
    const CONFIG_MAPS_GENERAL_LON = 'brocode_maps/general/long';

    const CONFIG_STORELOCATION_LAT = 'general/store_location_information/lat';
    const CONFIG_STORELOCATION_LON = 'general/store_location_information/lon';

    const PROVIDER_MYSTORE = 'mystore';
    const PROVIDER_ALLSTORES = 'allstores';
}
