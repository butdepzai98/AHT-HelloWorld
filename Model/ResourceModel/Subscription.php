<?php
namespace AHT\HelloWorld\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Subscription extends AbstractDb
{
    function _construct()
    {
        $this->_init('aht_helloworld_subscription', 'subscription_id');
    }
}