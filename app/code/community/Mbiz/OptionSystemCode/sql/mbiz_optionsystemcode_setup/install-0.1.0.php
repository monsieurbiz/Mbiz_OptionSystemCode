<?php
/**
 * This file is part of Mbiz_OptionSystemCode for Magento.
 *
 * @license MIT
 * @author Jacques Bodin-Hullin <j.bodinhullin@monsieurbiz.com> <@jacquesbh>
 * @category Mbiz
 * @package Mbiz_OptionSystemCode
 * @copyright Copyright (c) 2016 Monsieur Biz (https://monsieurbiz.com/)
 */

try {

    /* @var $conn Varien_Db_Adapter_Interface */
    /* @var $installer Mage_Core_Model_Resource_Setup */
    $installer = $this;
    $installer->startSetup();

    $tableName = $installer->getTable('catalog/product_option');
    $conn->addColumn($tableName, 'system_code', [
        'type' => Varien_Db_Ddl_Table::TYPE_TEXT,
        'length' => 255,
        'null' => true,
        'default' => null,
        'comment' => "System code used to identify an option",
    ]);

    $installer->endSetup();

} catch (Exception $e) {
    // Silence is golden
}
