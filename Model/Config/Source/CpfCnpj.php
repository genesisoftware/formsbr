<?php
namespace Genesisoft\FormsBr\Model\Config\Source;

/**
 * Source for template
 *
 * @api
 * @since 100.0.2
 */
class CpfCnpj implements \Magento\Framework\Data\OptionSourceInterface
{

    const ALLOW_CPF_AND_CNPJ = 0;
    const ALLOW_CPF_ONLY = 1;
    const ALLOW_CNPJ_ONLY = 2;

    /**
     * Client registration options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options = [
                        ['value' => self::ALLOW_CPF_AND_CNPJ, 'label' => __('CPF and CNPJ')],
                        ['value' => self::ALLOW_CPF_ONLY, 'label' => __('CPF Only')],
                        ['value' => self::ALLOW_CNPJ_ONLY, 'label' => __('CNPJ Only')]
            ];
        return $options;
    }
}
