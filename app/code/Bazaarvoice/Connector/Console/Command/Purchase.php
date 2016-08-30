<?php
/**
 * StoreFront Bazaarvoice Extension for Magento
 *
 * PHP Version 5
 *
 * LICENSE: This source file is subject to commercial source code license
 * of StoreFront Consulting, Inc.
 *
 * @category  SFC
 * @package   Bazaarvoice_Ext
 * @author    Dennis Rogers <dennis@storefrontconsulting.com>
 * @copyright 2016 StoreFront Consulting, Inc
 * @license   http://www.storefrontconsulting.com/media/downloads/ExtensionLicense.pdf StoreFront Consulting Commercial License
 * @link      http://www.StoreFrontConsulting.com/bazaarvoice-extension/
 */

namespace Bazaarvoice\Connector\Console\Command;

use \Bazaarvoice\Connector\Model\Feed\PurchaseFeed;
use \Symfony\Component\Console\Command\Command;

class Purchase extends Command
{
    /** @var PurchaseFeed $_purchaseFeed */
    protected $_purchaseFeed;

    /**
     * Purchase constructor.
     * @param PurchaseFeed $purchaseFeed
     */
    public function __construct(PurchaseFeed $purchaseFeed)
    {
        parent::__construct();
        $this->_purchaseFeed = $purchaseFeed;
    }

    protected function configure()
    {
        $this->setName('bv:purchase')->setDescription('Generates Bazaarvoice Purchase Feed.');
    }

    protected function execute()
    {
        echo "\n" . 'Memory usage: ' . memory_get_usage() . "\n";
        $this->_purchaseFeed->generateFeed();
        echo "\n" . 'Memory usage: ' . memory_get_usage() . "\n";
    }

}