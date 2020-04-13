<?php
/**
 * @author      Benjamin Rosenberger <rosenberger@e-conomix.at>
 * @package BroCode\Controller\Maps
 * @copyright Copyright (c) 2020 E-CONOMIX GmbH (https://www.e-conomix.at)
 * @created 12.04.2020
 */

namespace BroCode\Maps\Controller\Maps;

use BroCode\Maps\Api\Constants;
use BroCode\Maps\Api\MapServiceInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ActionInterface;

/**
 * Class Marker
 * @package BroCode\Controller\Maps
 */
class Marker extends \Magento\Framework\App\Action\Action implements ActionInterface, HttpGetActionInterface
{
    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    private $jsonResultFactory;
    /**
     * @var MapServiceInterface
     */
    private $mapService;
    /**
     * @var \BroCode\Maps\Api\Data\MapsCriteriaInterfaceFactory
     */
    private $mapsCriteriaFactory;

    /**
     * Marker constructor.
     * @param \Magento\Framework\Controller\Result\JsonFactory $jsonResultFactory
     * @param MapServiceInterface $mapService
     * @param \BroCode\Maps\Api\Data\MapsCriteriaInterfaceFactory $mapsCriteriaFactory
     * @param Context $context
     */
    public function __construct(
        \Magento\Framework\Controller\Result\JsonFactory $jsonResultFactory,
        MapServiceInterface $mapService,
        \BroCode\Maps\Api\Data\MapsCriteriaInterfaceFactory $mapsCriteriaFactory,
        Context $context
    ) {
        parent::__construct($context);
        $this->jsonResultFactory = $jsonResultFactory;
        $this->mapService = $mapService;
        $this->mapsCriteriaFactory = $mapsCriteriaFactory;
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $result = $this->jsonResultFactory->create();

        // TODO create criteria based on request
        /** @var \BroCode\Maps\Api\Data\MapsCriteriaInterface $criteria */
        $criteria = $this->mapsCriteriaFactory->create();

        $providerId = $this->getRequest()->getParam('providerId');

        $mapsData = $this->mapService->findMapsData($criteria, $providerId);
        $result->setData(array_map(function ($data) {
            return $data->getData();
        }, $mapsData));
        return $result;
    }
}
