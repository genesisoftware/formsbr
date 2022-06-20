<?php
namespace Genesisoft\FormsBr\Plugin\Customer\Block\Widget\Taxvat;

class Plugin
{
    public function beforeToHtml(\Magento\Customer\Block\Widget\Taxvat $subject) {
        $subject->setTemplate('Genesisoft_FormsBr::widget/taxvat.phtml');
    }
}
