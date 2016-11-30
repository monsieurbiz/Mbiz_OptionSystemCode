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
 * Catalog_Product_Type_Grouped Model
 * @package Mbiz_OptionSystemCode
 */
trait Mbiz_OptionSystemCode_Model_Catalog_Product_Type_Trait_OrderOptions
{

    /**
     * Prepare additional options/information for order item which will be
     * created from this product
     *
     * @param Mage_Catalog_Model_Product $product
     * @return array
     */
    public function getOrderOptions($product = null)
    {
        $optionArr = parent::getOrderOptions($product);
        $product = $this->getProduct($product);

        if (isset($optionArr['options'])) {
            $optionIds = $product->getCustomOption('option_ids');
            if ($optionIds) {
                foreach (explode(',', $optionIds->getValue()) as $optionId) {
                    $option = $product->getOptionById($optionId);
                    if ($option) {
                        foreach ($optionArr['options'] as &$_option) {
                            if ($_option['option_id'] === $option->getId()) {
                                $_option['option_system_code'] = $option->getSystemCode();
                            }
                        }
                    }
                }
            }
        }

        return $optionArr;
    }

}
