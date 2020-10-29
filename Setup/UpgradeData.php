<?php
namespace AHT\HelloWorld\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements UpgradeDataInterface
{
    function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if ($context->getVersion()
            && version_compare($context->getVersion(), '1.0.0') < 0
        ) {
            $table = $setup->getTable('testimonial');
            $setup->getConnection()
                ->insertForce($table, ['title' => 'It is the best service']);

            $setup->getConnection()
                ->update($table, ['content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit']);
        
            $setup->getConnection()
                ->update($table, ['rate' => 5]);

            $setup->getConnection()
                ->update($table, ['customer' => 'John Doe']);

            $setup->getConnection()
                ->update($table, ['customer_position' => 'CEO']);

            $setup->getConnection()
                ->update($table, ['active' => 1]);
        }
        $setup->endSetup();
    }
}