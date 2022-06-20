<?php

namespace Genesisoft\FormsBr\Plugin\Checkout\Block\Checkout\AttributeMerger;
class Plugin
{
    public function afterMerge(\Magento\Checkout\Block\Checkout\AttributeMerger $subject, $result) {
        // Adiciona placeholder e validações nos campos de endereço do checkout
        if (array_key_exists('street', $result)) {
            unset($result['street']['children'][0]['label']);
            $result['street']['children'][0]['placeholder'] = __('Street');
            $result['street']['children'][0]['validation'] = ['required-entry' => true,
                                                              'min_text_length' => 3];
            if (array_key_exists(1, $result['street']['children'])) {
                unset($result['street']['children'][1]['label']);
                $result['street']['children'][1]['placeholder'] = __('Number');
                $result['street']['children'][1]['validation'] = ['required-entry' => true];
            }
            if (array_key_exists(2, $result['street']['children'])) {
                unset($result['street']['children'][2]['label']);
                $result['street']['children'][2]['placeholder'] = __('District');
                $result['street']['children'][2]['validation'] = ['required-entry' => true,
                                                                  'min_text_length' => 3];
            }
            if (array_key_exists(3, $result['street']['children'])) {
                unset($result['street']['children'][3]['label']);
                $result['street']['children'][3]['placeholder'] = __('Complement');
            }
        }
        return $result;
    }
}
