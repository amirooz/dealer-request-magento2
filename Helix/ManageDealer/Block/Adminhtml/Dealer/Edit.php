<?php
namespace Helix\ManageDealer\Block\Adminhtml\Dealer;

class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;
    /**
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_objectId = 'dealer_id';
        $this->_blockGroup = 'Helix_ManageDealer';
        $this->_controller = 'adminhtml_dealer';
        parent::_construct();
        $this->buttonList->update('save', 'label', __('Save Dealer'));
        $this->buttonList->update('delete', 'label', __('Delete'));
        $this->buttonList->add(
            'saveandcontinue',
            [
                'label' => __('Save and Continue Edit'),
                'class' => 'save',
                'data_attribute' => [
                    'mage-init' => ['button' => ['event' => 'saveAndContinueEdit', 'target' => '#edit_form']],
                ]
            ],
            -100
        );
    }
    /**
     * Get edit form container header text
     *
     * @return \Magento\Framework\Phrase
     */
    public function getHeaderText()
    {
        if ($this->_coreRegistry->registry('dealer_item')->getId()) {
            return __("Edit Block '%1'", $this->escapeHtml($this->_coreRegistry->registry('dealer_item')->getName()));
        } else {
            return __('New Dealer');
        }
    }
}
