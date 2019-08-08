<?php
namespace Helix\ManageDealer\Controller\Account;

use Magento\Framework\App\Action\Context;
use Helix\ManageDealer\Model\DealerFactory;

class Save extends \Magento\Framework\App\Action\Action
{
    protected $_dealer;

    public function __construct(
        Context $context,
        DealerFactory $dealer
    ) {
        $this->_dealer = $dealer;
        parent::__construct($context);
    }
    public function execute()
    {
        $data = $this->getRequest()->getParams();
        $dealer = $this->_dealer->create();
        $dealer->setData($data);
        if($dealer->save()){
            $this->messageManager->addSuccessMessage(__('Thank you for showing interest, we will contact you soon.'));
        }else{
            $this->messageManager->addErrorMessage(__('Your request is failed!'));
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('/');
        return $resultRedirect;
    }
}
