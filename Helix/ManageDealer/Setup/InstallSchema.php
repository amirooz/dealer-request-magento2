<?php
namespace Helix\ManageDealer\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallSchema implements InstallSchemaInterface
{

  	public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
  	{
    		$installer = $setup;
    		$installer->startSetup();
    		if (!$installer->tableExists('wcs_interested_dealer')) {
      			$table = $installer->getConnection()->newTable(
      				$installer->getTable('wcs_interested_dealer')
      			)
            ->addColumn(
                'dealer_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                [
                  'identity' => true,
                  'nullable' => false,
                  'primary'  => true,
                  'unsigned' => true
                ],
                'Dealer ID'
            )
            ->addColumn(
                'business_name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [ 'nullable' => false ],
                'Business Name'
            )
            ->addColumn(
                'primary_contact',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [ 'nullable' => false ],
                'Primary Contact'
            )
            ->addColumn(
                'phone',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                16,
                [ 'nullable' => false ],
                'Phone Number'
            )
            ->addColumn(
                'fax',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                20,
                [ 'nullable' => false ],
                'Fax Number'
            )
            ->addColumn(
                'email',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [ 'nullable' => false ],
                'Primary Email'
            )
            ->addColumn(
                'federal_tax_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                55,
                [ 'nullable' => false ],
                'Federal Tax Identification Number'
            )
            ->addColumn(
                'state_sales_tax_exemption_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                55,
                [ 'nullable' => true ],
                'State Sales Tax Exemption Number'
            )
            ->addColumn(
                'street_address',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [ 'nullable' => false ],
                'Street Address'
            )
            ->addColumn(
                'city',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                55,
                [ 'nullable' => false ],
                'City'
            )
            ->addColumn(
                'state',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                55,
                [ 'nullable' => false ],
                'State'
            )
            ->addColumn(
                'postal',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                10,
                [ 'nullable' => false ],
                'Postal Code'
            )
            ->addColumn(
                'country',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                55,
                [ 'nullable' => false ],
                'Country'
            )
    				->addColumn(
    						'created_at',
    						\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
    						null,
    						['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
    						'Created At'
    				)->addColumn(
    					'updated_at',
    					\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
    					null,
    					['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
    					'Updated At')
    				->setComment('WCS Interested Dealer Table');
    			$installer->getConnection()->createTable($table);

  			$installer->getConnection()->addIndex(
  				$installer->getTable('wcs_interested_dealer'),
  				$setup->getIdxName(
  					$installer->getTable('wcs_interested_dealer'),
  					['business_name','primary_contact','email','city','state','country'],
  					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
  				),
  				['business_name','primary_contact','email','city','state','country'],
  				\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
  			);
  		}
  		$installer->endSetup();
  	}
}
