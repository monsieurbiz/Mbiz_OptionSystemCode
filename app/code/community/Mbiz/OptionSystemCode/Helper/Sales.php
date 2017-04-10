<?php
/**
 * This file is part of Mbiz_OptionSystemCode for Magento.
 *
 * @license proprietary
 * @author Jacques Bodin-Hullin <j.bodinhullin@monsieurbiz.com> <@jacquesbh>
 * @category Mbiz
 * @package Mbiz_OptionSystemCode
 * @copyright Copyright (c) 2017 Monsieur Biz (https://monsieurbiz.com/)
 */

/**
 * Sales Helper
 * @package Mbiz_OptionSystemCode
 */
class Mbiz_OptionSystemCode_Helper_Sales extends Mage_Core_Helper_Abstract
{

    /**
     * Retrieve an option from an object using its system code
     *
     * @param $object Object to search in
     * @param $code Option's system code
     *
     * @return false|Mage_Sales_Model_Quote_Item_Option False is returned if the option is not found
     */
    public function getOptionByCode($object, $code)
    {
        switch (true) {
            case $object instanceof Mage_Sales_Model_Quote_Item:
                return $this->_getOptionByCodeFromQuoteItem($object, $code);
                break;
            default:
                Mage::throwException('Opject type incorrect.');
        }

        return false;
    }

    /**
     * Retrieve the option from Quote item
     *
     * @param Mage_Sales_Model_Quote_Item $item
     * @param $code System code
     *
     * @return Mage_Sales_Model_Quote_Item_Option|false False is returned if the option is not found
     */
    protected function _getOptionByCodeFromQuoteItem(Mage_Sales_Model_Quote_Item $item, $code)
    {
        $options = $item->getProduct()->getOptions();
        foreach ($options as $option) {
            if ($option->getSystemCode() !== $code) {
                continue;
            }

            return $item->getOptionByCode(sprintf('option_%d', $option->getId()));
        }

        return false;
    }

}