<?php
namespace Helix\ManageDealer\Block\Adminhtml;

class Dealer extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_blockGroup = 'Helix_ManageDealer';
        $this->_controller = 'adminhtml_dealer';
        $this->_headerText = __('Dealers');
        $this->_addButtonLabel = __('Add Dealers');
        parent::_construct();
    }
}
