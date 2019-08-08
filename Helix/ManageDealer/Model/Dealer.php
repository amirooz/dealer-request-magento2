<?php
namespace Helix\ManageDealer\Model;
/**
 * Helix ManageDealer model
 *
 * @method \Helix\ManageDealer\Model\ResourceModel\Dealer _getResource()
 * @method \Helix\ManageDealer\Model\ResourceModel\Dealer getResource()
 * @method string getId()
 * @method string getName()
 * @method string getEmail()
 * @method setSortOrder()
 * @method int getSortOrder()
 */
class Dealer extends \Magento\Framework\Model\AbstractModel
{

    /**
     * Helix ManageDealer cache tag
     */
    const CACHE_TAG = 'helix_managedealer';
    /**
     * @var string
     */
    protected $_cacheTag = 'helix_managedealer';
    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'helix_managedealer';
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Helix\ManageDealer\Model\ResourceModel\Dealer');
    }
    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId(), self::CACHE_TAG . '_' . $this->getId()];
    }
    
    public function getDefaultValues()
  	{
  		$values = [];
  		return $values;
  	}
}
