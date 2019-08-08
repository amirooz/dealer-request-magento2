<?php
namespace Helix\ManageDealer\Controller\Adminhtml\Dealer;

class Edit extends \Helix\ManageDealer\Controller\Adminhtml\Dealer
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;
    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context, $coreRegistry);
    }
    /**
     * Edit item
     *
     * @return \Magento\Framework\Controller\ResultInterface
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('dealer_id');
        $model = $this->_objectManager->create('Helix\ManageDealer\Model\Dealer');
        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This item no longer exists.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        // 3. Set entered data if was error when we do save
        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
        // 4. Register model to use later in blocks
        $this->_coreRegistry->register('dealer_item', $model);
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        // 5. Build edit form
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Dealer') : __('New Dealer'),
            $id ? __('Edit Dealer') : __('New Dealer')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Dealers'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? $model->getName() : __('New Dealer'));
        return $resultPage;
    }
}
