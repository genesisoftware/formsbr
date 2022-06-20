<?php

namespace Genesisoft\FormsBr\Plugin\Model\Plugin\Checkout\LayoutProcessor;

class Plugin
{

    protected $scopeConfig;

    public function __construct(\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @param \Magento\Checkout\Block\Checkout\LayoutProcessor $subject
     * @param array $jsLayout
     * @return array
     */
    public function afterProcess(
        \Magento\Checkout\Block\Checkout\LayoutProcessor $subject,
        array $jsLayout
    ) {
        $configuration = $jsLayout['components']['checkout']['children']['steps']['children']['billing-step']['children']['payment']['children']['payments-list']['children'];
        foreach ($configuration as $paymentGroup => $groupConfig) {
            if (isset($groupConfig['component']) && $groupConfig['component'] === 'Magento_Checkout/js/view/billing-address') {
                if (isset($groupConfig['children']['form-fields']['children'])) {

                    $vatId = &$jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
                    ['shippingAddress']['children']['shipping-address-fieldset']['children']['vat_id'];
                    $vatId['sortOrder'] = 64;

                    // Recupera configuração de permissão de registro para CPF/CNPJ
                    $allowcpfcnpj = $this->scopeConfig->getValue(
                        'customer/create_account/allowcpfcnpj'
                    );

                    if ($allowcpfcnpj == \Jn2\FormsBr\Model\Config\Source\CpfCnpj::ALLOW_CPF_ONLY) {
                        $vatId['config']['elementTmpl'] = 'Jn2_FormsBr/form/element/cpf';
                        $vatId['label'] = 'CPF';
                        $vatId['validation'] = ['required-entry' => true, 'validate-cpf' => true];
                    } elseif ($allowcpfcnpj == \Jn2\FormsBr\Model\Config\Source\CpfCnpj::ALLOW_CNPJ_ONLY) {
                        $vatId['config']['elementTmpl'] = 'Jn2_FormsBr/form/element/cnpj';
                        $vatId['label'] = 'CNPJ';
                        $vatId['validation'] = ['required-entry' => true, 'validate-cnpj' => true];
                    } else {
                        $vatId['config']['elementTmpl'] = 'Jn2_FormsBr/form/element/vat-id';
                        $vatId['validation'] = ['required-entry' => true, 'validate-vat-id' => true];
                    }

                    $postcode = &$jsLayout['components']['checkout']['children']['steps']['children']['billing-step']['children']
                    ['payment']['children']['payments-list']['children'][$paymentGroup]['children']['form-fields']['children']['postcode'];
                    $postcode['sortOrder'] = 65;
                    $postcode['config']['elementTmpl'] = 'Jn2_FormsBr/form/element/postcode';

                    $telephone = &$jsLayout['components']['checkout']['children']['steps']['children']['billing-step']['children']
                    ['payment']['children']['payments-list']['children'][$paymentGroup]['children']['form-fields']['children']['telephone'];
                    $telephone['config']['elementTmpl'] = 'Jn2_FormsBr/form/element/telephone';
                    $telephone['validation'] = ['required-entry'=>true,'max_text_length' => 15,'min_text_length' => 14];

                }
            }
        }

        return $jsLayout;
    }
}

