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
 * @package     Magento_Core
 * @subpackage  integration_tests
 * @copyright   Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
\Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get('Magento\Framework\App\AreaList')
    ->getArea(\Magento\Backend\App\Area\FrontNameResolver::AREA_CODE)
    ->load(\Magento\Core\Model\App\Area::PART_CONFIG);
\Magento\TestFramework\Helper\Bootstrap::getObjectManager()->configure(array(
    'preferences' => array(
        'Magento\Core\Model\Theme' => 'Magento\Core\Model\Theme\Data'
    )
));
/** @var $registration \Magento\Core\Model\Theme\Registration */
$registration = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
    'Magento\Core\Model\Theme\Registration'
);
$registration->register(__DIR__, implode('/', array('*', '*', 'theme.xml')));
