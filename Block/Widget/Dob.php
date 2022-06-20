<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Genesisoft\FormsBr\Block\Widget;

/**
 * Class Dob
 *
 * @SuppressWarnings(PHPMD.DepthOfInheritance)
 */
class  Dob extends \Magento\Customer\Block\Widget\Dob
{
    /**
     * Return data-validate rules
     *
     * @return string
     */
    public function getHtmlExtraParams()
    {
        $validators = [];
        if ($this->isRequired()) {
            $validators['required'] = true;
        }

        $validators['validate-date'] = [
            'dateFormat' => $this->getDateFormat()
        ];
        #$validators['validate-dob'] = true;

        return 'data-bind="afterRender:ko.dateMask" data-validate="' . $this->_escaper->escapeHtml(json_encode($validators)) . '"';
    }

}
