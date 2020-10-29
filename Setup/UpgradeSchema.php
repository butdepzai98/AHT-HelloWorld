<?php
namespace AHT\HelloWorld\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context ) {
        $installer = $setup;
 
        $installer->startSetup();

        if(version_compare($context->getVersion(), '1.0.0', '<')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('testimonial')
            )
            ->addColumn(
                'id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                [
                    'identity' => true,
                    'nullable' => false,
                    'primary' => true,
                    'unsigned' => true,
                ],
                'ID'
            )
            ->addColumn(
                'title',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable => false'],
                'Title'
            )
            ->addColumn(
                'content',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [],
                'Content'
            )
            ->addColumn(
                'rate',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                [],
                'rate'
            )
            ->addColumn(
                'customer',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                50,
                [],
                'Customer'
            )
            ->addColumn(
                'customer_position',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                25,
                [],
                'Customer Position'
            )
            ->addColumn(
                'active',
                \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
                1,
                [],
                'Active'
            )
            ->setComment('Testimonial Table');
            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}
