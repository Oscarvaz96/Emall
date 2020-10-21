<?php

namespace Transom\Emall\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
*   @codeCoverageIgnore
*/
class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface    $setup, 
                            ModuleContextInterface  $context)
    {
        $installer = $setup;
        $installer->startSetup();
        $table = $installer->getConnection()
                            ->newTable($installer->getTable('store_owner_emall'))
                            ->addColumn(
                                    'store_owner_id',
                                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                                    null,
                                    ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                                    'Store Owner Id'
                            )
                            ->addColumn(
                                    'customer_name',
                                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                                    null,
                                    ['unsigned' =>  true],
                                    'Customer'
                            )
                            ->addColumn(
                                    'business',
                                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                                    null,
                                    ['nullable' =>  true],
                                    'Business Name'
                            )
                            ->addColumn(
                                    'business_line',
                                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                                    null,
                                    ['nullable' =>  true],
                                    'Business Line'
                            )
                            ->addColumn(
                                'website_address',
                                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                                null,
                                ['nullable' =>  true],
                                'Website Address'
                            )
                            ->addColumn(
                                'facebook',
                                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                                null,
                                ['nullable' =>  true],
                                'Facebook'
                            )
                            ->addColumn(
                                'instagram',
                                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                                null,
                                ['nullable' =>  true],
                                'Instagram'
                            )
                            ->addColumn(
                                'email',
                                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                                null,
                                ['nullable' =>  true],
                                'Email'
                            )
                            ->addColumn(
                                'phone_number',
                                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                                null,
                                ['nullable' =>  true],
                                'Phone Number'
                            )
                            ->addColumn(
                                'business_phone_number',
                                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                                null,
                                ['nullable' =>  true],
                                'Business Phone Number'
                            )
                            ->addColumn(
                                'zip_code',
                                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                                null,
                                ['nullable' =>  true],
                                'Zip Code'
                            )
                            ->addColumn(
                                'state',
                                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                                null,
                                ['nullable' =>  true],
                                'State'
                            )
                            ->addColumn(
                                'city',
                                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                                null,
                                ['nullable' =>  true],
                                'City'
                            )
                            ->addColumn(
                                'suburb',
                                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                                null,
                                ['nullable' =>  true],
                                'Suburb'
                            )
                            ->addColumn(
                                    'created_at',
                                    \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                                    null,
                                    ['nullable' =>  false],
                                    'Created At'
                            )
                            ->addIndex(
                                    $installer->getIdxName('store_owner_emall',  ['store_owner_id']),
                                    ['store_owner_id']
                            )
                            ->setComment('Store Owner Landingpage');
        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}