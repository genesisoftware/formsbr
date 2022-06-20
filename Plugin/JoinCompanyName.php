<?php

namespace Genesisoft\FormsBr\Plugin;

use Magento\Framework\View\Element\UiComponent\DataProvider\CollectionFactory;

class JoinCompanyName
{
    public function afterGetReport(
        CollectionFactory $subject,
        $collection,
        $requestName
    ) {
        if ($requestName == 'sales_order_grid_data_source') {
            $select = $collection->getSelect();
            $select->joinLeft(
                ['entvar' => $collection->getTable('customer_entity_varchar')],
                'main_table.customer_id = entvar.entity_id and entvar.attribute_id = 144',
                ['value']
            );
        }
        return $collection;
    }
}
