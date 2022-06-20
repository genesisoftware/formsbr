<?php
namespace Genesisoft\FormsBr\Helper;

/**
 * Customer address helper
 *
 * @api
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @since 100.0.2
 */
class Address extends \Magento\Framework\App\Helper\AbstractHelper
{
    public function getAllowCpfCnpj () {
        // Recupera configuração de permissão de registro para CPF/CNPJ
        $allowcpfcnpj = $this->scopeConfig->getValue(
            'customer/create_account/allowcpfcnpj'
        );

        return $allowcpfcnpj;
    }
}
