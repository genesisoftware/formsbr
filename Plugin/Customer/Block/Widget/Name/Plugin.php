<?php
namespace Genesisoft\FormsBr\Plugin\Customer\Block\Widget\Name;

class Plugin
{
    public function beforeToHtml(\Magento\Customer\Block\Widget\Name $subject) {
        $subject->setTemplate('Genesisoft_FormsBr::widget/name.phtml');
    }
}
