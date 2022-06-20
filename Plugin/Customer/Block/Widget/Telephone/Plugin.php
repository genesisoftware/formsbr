<?php
namespace Genesisoft\FormsBr\Plugin\Customer\Block\Widget\Telephone;

class Plugin
{
    public function beforeToHtml(\Magento\Customer\Block\Widget\Telephone $subject) {
        $subject->setTemplate('Genesisoft_FormsBr::widget/telephone.phtml');
    }
}
