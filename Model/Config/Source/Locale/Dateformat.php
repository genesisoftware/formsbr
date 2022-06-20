<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Locale timezone source
 */
namespace Genesisoft\FormsBr\Model\Config\Source\Locale;

/**
 * @api
 * @since 100.0.2
 */
class Dateformat implements \Magento\Framework\Option\ArrayInterface
{

    public function __construct()
    {
    }

    public function toOptionArray()
    {
//        Inserindo as configurações de formato de data que ficarão disponíveis na adminitração.
//        No link a seguir é possível visualizar a documentação e as variações possíveis.
//        http://userguide.icu-project.org/formatparse/datetime
        $configs = [
            "1" => ["value" => \IntlDateFormatter::SHORT,
                "label" => "Brasileiro (Exemplo: 01/01/2020 10:30)"],
            "2" => ["value" => \IntlDateFormatter::MEDIUM,
                "label" => "Padrão Americano"]
        ];

        return $configs;
    }
}
