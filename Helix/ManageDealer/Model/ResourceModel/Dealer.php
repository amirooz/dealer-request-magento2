<?php
namespace Helix\ManageDealer\Model\ResourceModel;

class Dealer extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Define main table
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('wcs_interested_dealer', 'dealer_id');
    }
}
