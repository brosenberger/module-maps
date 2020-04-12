<?php
/**
 * @author      Benjamin Rosenberger <rosenberger@e-conomix.at>
 * @package BroCode\Controller\Maps
 * @copyright Copyright (c) 2020 E-CONOMIX GmbH (https://www.e-conomix.at)
 * @created 12.04.2020
 */

namespace BroCode\Maps\Controller\Maps;

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
     * Marker constructor.
     * @param \Magento\Framework\Controller\Result\JsonFactory $jsonResultFactory
     * @param Context $context
     */
    public function __construct(
        \Magento\Framework\Controller\Result\JsonFactory $jsonResultFactory,
        Context $context
    ) {
        parent::__construct($context);
        $this->jsonResultFactory = $jsonResultFactory;
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $result = $this->jsonResultFactory->create();
        $result->setData([[51.5, -0.09],[51.4, -0.09]]);
        return $result;
    }
}
