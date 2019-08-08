<?php
namespace Helix\ManageDealer\Controller\Account;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\Result\ForwardFactory;
use Magento\Framework\Exception\NotFoundException;
use Magento\Framework\App\RequestInterface;

class Create extends \Magento\Framework\App\Action\Action
{
		protected $_pageFactory;

	  protected $resultForwardFactory;

	  protected $helper;

		/**
     * Index constructor.
     *
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory
     * @param \Helix\ManageDealer\Helper\Data $helper
     */
		public function __construct(
				Context $context,
				PageFactory $pageFactory,
				ForwardFactory $resultForwardFactory,
	      \Helix\ManageDealer\Helper\Data $helper
		)
		{
				$this->_pageFactory = $pageFactory;
				$this->resultForwardFactory = $resultForwardFactory;
	      $this->helper = $helper;
				return parent::__construct($context);
		}

		/**
     * Dispatch request
     *
     * @param RequestInterface $request
     * @return \Magento\Framework\App\ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function dispatch(RequestInterface $request)
    {
        if (!$this->helper->isEnabled()) {
            throw new NotFoundException(__('Page not found.'));
        }
        return parent::dispatch($request);
    }

		public function execute()
		{
		    $resultPage = $this->_pageFactory->create();
		    $resultPage->getConfig()->getTitle()->set(__('Become A Dealer'));
				if (!$resultPage) {
            $resultForward = $this->resultForwardFactory->create();
            return $resultForward->forward('noroute');
        }
		    return $resultPage;
		}
}
