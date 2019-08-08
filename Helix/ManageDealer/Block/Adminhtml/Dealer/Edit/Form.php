<?php
namespace Helix\ManageDealer\Block\Adminhtml\Dealer\Edit;
/**
 * Adminhtml Helix dealer edit form
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * @var \Magento\Cms\Model\Wysiwyg\Config
     */
    protected $_wysiwygConfig;
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;
    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig
     * @param \Magento\Store\Model\System\Store $systemStore
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        \Magento\Store\Model\System\Store $systemStore,
        array $data = []
    ) {
        $this->_wysiwygConfig = $wysiwygConfig;
        $this->_systemStore = $systemStore;
        parent::__construct($context, $registry, $formFactory, $data);
    }
    /**
     * Init form
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('dealer_form');
        $this->setTitle(__('Dealer Information'));
    }
    /**
     * Prepare form
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('dealer_item');
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post']]
        );
        $form->setHtmlIdPrefix('item_');
        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('General Information'), 'class' => 'fieldset-wide']
        );
        if ($model->getId()) {
            $fieldset->addField('dealer_id', 'hidden', ['name' => 'dealer_id']);
        }
        $fieldset->addField(
            'business_name',
            'text',
            [
                'name' => 'business_name',
                'label' => __('Business Name'),
                'title' => __('Business Name'),
                'required' => true
            ]
        );

        $fieldset->addField(
            'primary_contact',
            'text',
            [
                'name' => 'primary_contact',
                'label' => __('Primary Contact'),
                'title' => __('Primary Contact'),
                'required' => true
            ]
        );

        $fieldset->addField(
            'phone',
            'text',
            [
                'name' => 'phone',
                'label' => __('Phone'),
                'title' => __('Phone'),
                'required' => true
            ]
        );

        $fieldset->addField(
            'fax',
            'text',
            [
                'name' => 'fax',
                'label' => __('Fax'),
                'title' => __('Fax'),
                'required' => true
            ]
        );

        $fieldset->addField(
            'email',
            'text',
            [
                'name' => 'email',
                'label' => __('Primary Email'),
                'title' => __('Primary Email'),
                'required' => true
            ]
        );

        $fieldset->addField(
            'federal_tax_id',
            'text',
            [
                'name' => 'federal_tax_id',
                'label' => __('Federal Tax Identification Number'),
                'title' => __('Federal Tax Identification Number'),
                'required' => true
            ]
        );

        $fieldset->addField(
            'state_sales_tax_exemption_id',
            'text',
            [
                'name' => 'state_sales_tax_exemption_id',
                'label' => __('State Sales Tax Exemption Number'),
                'title' => __('State Sales Tax Exemption Number'),
                'required' => true
            ]
        );

        $fieldset->addField(
            'street_address',
            'text',
            [
                'name' => 'street_address',
                'label' => __('Street Address'),
                'title' => __('Street Address'),
                'required' => true
            ]
        );

        $fieldset->addField(
            'city',
            'text',
            [
                'name' => 'city',
                'label' => __('City'),
                'title' => __('City'),
                'required' => true
            ]
        );

        $fieldset->addField(
            'state',
            'text',
            [
                'name' => 'state',
                'label' => __('State'),
                'title' => __('State'),
                'required' => true
            ]
        );

        $fieldset->addField(
            'postal',
            'text',
            [
                'name' => 'postal',
                'label' => __('Postal Code'),
                'title' => __('Postal Code'),
                'required' => true
            ]
        );

        $fieldset->addField(
            'country',
            'text',
            [
                'name' => 'country',
                'label' => __('Country'),
                'title' => __('Country'),
                'required' => true
            ]
        );

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
