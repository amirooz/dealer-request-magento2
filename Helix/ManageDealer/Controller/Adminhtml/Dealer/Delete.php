<?php
namespace Helix\ManageDealer\Controller\Adminhtml\Dealer;

class Delete extends \Helix\ManageDealer\Controller\Adminhtml\Dealer
{
    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('dealer_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create('Helix\ManageDealer\Model\Dealer');
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccess(__('You have deleted the dealer.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addError($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['dealer_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addError(__('We can\'t find the item to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
