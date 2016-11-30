<?php
/**
 * This file is part of Mbiz_OptionSystemCode for Magento.
 *
 * @license proprietary
 * @author Jacques Bodin-Hullin <j.bodinhullin@monsieurbiz.com> <@jacquesbh>
 * @category Mbiz
 * @package Mbiz_OptionSystemCode
 * @copyright Copyright (c) 2016 Monsieur Biz (https://monsieurbiz.com/)
 */

/**
 * Product_Configuration Helper
 * @package Mbiz_OptionSystemCode
 */
class Mbiz_OptionSystemCode_Helper_Product_Configuration extends Mage_Catalog_Helper_Product_Configuration
{

    /**
     * {@inheritdoc}
     *
     * We add the system_code on every option.
     * It's useful to customize the frontend depending on it.
     */
    public function getCustomOptions(Mage_Catalog_Model_Product_Configuration_Item_Interface $item)
    {
        // Add system code
        $product = $item->getProduct();
        $optionIds = $item->getOptionByCode('option_ids');
        if ($optionIds) {

            $options = parent::getCustomOptions($item);

            foreach (explode(',', $optionIds->getValue()) as $optionId) {
                $option = $product->getOptionById($optionId);
                if ($option) {
                    foreach ($options as &$_option) {
                        if ($_option['option_id'] === $option->getId()) {
                            $_option['option_system_code'] = $option->getSystemCode();
                        }
                    }
                }
            }

            return $options;
        }

        return [];
    }

}
