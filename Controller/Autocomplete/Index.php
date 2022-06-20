<?php

namespace Genesisoft\FormsBr\Controller\Autocomplete;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Directory\Model\RegionFactory;


class Index extends Action
{

    /**
     * @var RegionFactory
     */
    private $regionFactory;

    /**
     * @var JsonFactory
     */
    private $resultJsonFactory;

    public function __construct(
        Context $context,
        JsonFactory $resultJsonFactory,
        RegionFactory $regionFactory
    ) {
        $this->resultJsonFactory = $resultJsonFactory;
        $this->regionFactory = $regionFactory;
        parent::__construct($context);
    }


    public function execute() {
        $result = $this->resultJsonFactory->create();
        if ($this->getRequest()->isAjax()) {

            $postcode = $this->getRequest()->getPostValue('postcode');

            if ($postcode) {
                $postcode = substr(preg_replace("/[^0-9]/", "", $postcode) . '00000000', 0, 8);
                $url = "http://endereco.ecorreios.com.br/app/enderecoCep.php?cep={$postcode}";
                //$result = array();
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_USERAGENT, 'MoipMagento/2.0.0');
                $responseBody = curl_exec($ch);

                $response = json_decode($responseBody);
                $region = $this->regionFactory->create();
                $region = $region->loadByCode($response->uf, 'BR');
                $regionId = $region->getId();
                $response->uf_id = $regionId;

                return $result->setData($response);

            } else {
                return $result->setData('Correios indisponível');
            }
            #$result->setData($responseBody);
            /*$address[0] = 'Rua Alagoas';
            $address[1] = '1160';
            $address[2] = 'Funcionários';
            $address[3] = '301';*/

            #return $result->setData($address);

        }
    }

}
