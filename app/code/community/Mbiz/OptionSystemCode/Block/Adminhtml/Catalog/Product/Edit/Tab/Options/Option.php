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
 * Adminhtml_Catalog_Product_Edit_Tab_Options_Option Block
 * @package Mbiz_OptionSystemCode
 */
class Mbiz_OptionSystemCode_Block_Adminhtml_Catalog_Product_Edit_Tab_Options_Option extends Mage_Adminhtml_Block_Catalog_Product_Edit_Tab_Options_Option
{

    /**
     * Class constructor
     */
    public function __construct()
    {
        parent::__construct();

        // Change the template :')
        $this->setTemplate('catalog/product/edit/options/option-with-system-code.phtml');
    }

    /**
     * {@inheritdoc}
     */
    public function getOptionValues()
    {
        $values = parent::getOptionValues();
        $optionsArr = $this->getProduct()->getOptions();

        // We add the system code on each options
        foreach ($values as $value) {
            if ($optionsArr[$value->getOptionId()]) {
                // We add the system code because we have one.
                $value->setSystemCode($optionsArr[$value['option_id']]['system_code']);
            }
        }

        return $values;
    }

}
