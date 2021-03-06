<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Magento
 * @package     Magento_Catalog
 * @copyright   Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace Magento\Catalog\Model\Indexer\Product\Price\Action;

/**
 * Class Full reindex action
 *
 * @package Magento\Catalog\Model\Indexer\Product\Price\Action
 */
class Full extends \Magento\Catalog\Model\Indexer\Product\Price\AbstractAction
{
    /**
     * Execute Full reindex
     *
     * @param array|int|null $ids
     * @return void
     * @throws \Magento\Catalog\Exception
     */
    public function execute($ids = null)
    {
        try {
            $this->_useIdxTable(true);
            $this->_emptyTable($this->_getIdxTable());
            $this->_prepareWebsiteDateTable();
            $this->_prepareTierPriceIndex();
            $this->_prepareGroupPriceIndex();

            foreach ($this->getTypeIndexers() as $indexer) {
                $indexer->reindexAll();
            }
            $this->_syncData();
        } catch (\Exception $e) {
            throw new \Magento\Catalog\Exception($e->getMessage(), $e->getCode(), $e);
        }
    }
}
