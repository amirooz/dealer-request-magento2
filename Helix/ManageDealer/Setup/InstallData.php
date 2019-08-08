<?php
namespace Helix\ManageDealer\Setup;

use Helix\ManageDealer\Model\Dealer;
use Helix\ManageDealer\Model\DealerFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
	private $_dealerFactory;

	public function __construct(DealerFactory $dealerFactory)
	{
		$this->_dealerFactory = $dealerFactory;
	}

	public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		$dealerList = [
  			[
          'business_name'                  => "Helix IT Solution",
    			'primary_contact'                => "Jahid Hasan",
    			'phone'                          => '+71-756-568-966',
          'fax'                            => '867198984',
          'email'                          => 'jahid@helix.com',
          'federal_tax_id'                 => '7467887897',
          'state_sales_tax_exemption_id'   => '4896978979',
          'street_address'                 => 'Park Street',
          'city'                           => 'California',
          'state'                          => 'Caliber',
          'postal'                         => '91007',
    			'country'                        => 'USA'
        ],
        [
          'business_name'                  => "ISharify",
    			'primary_contact'                => "Biddhut Chomkai",
    			'phone'                          => '+71-756-568-999',
          'fax'                            => '8498984989',
          'email'                          => 'biddhut@isharify.com',
          'federal_tax_id'                 => '3456789876',
          'state_sales_tax_exemption_id'   => '4787979856',
          'street_address'                 => 'Wall Street',
          'city'                           => 'New York',
          'state'                          => 'Brooklyn',
          'postal'                         => '24566',
    			'country'                        => 'USA'
        ]
		];

    foreach ($dealerList as $data) {
        $this->createDealer()->setData($data)->save();
    }

    $setup->endSetup();

	}

  /**
     * Create Dealer List
     *
     * @return Dealer
     */
    public function createDealer()
    {
        return $this->_dealerFactory->create();
    }

}
