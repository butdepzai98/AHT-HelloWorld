<?php
namespace AHT\HelloWorld\Controller\Adminhtml\AdWellcome;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class Wellcome extends Action
{
    protected $_pageFactory;

    public function __construct(Action\Context $context, PageFactory $pageFactory)
    {
        parent::__construct($context);   
        $this->_pageFactory = $pageFactory;
    }

    public function execute()
    {
        $_pageFactory = $this->_pageFactory->create();
        $_pageFactory->getConfig()->getTitle()->prepend(__('Oh Wellcome My Daddy'));
        return $_pageFactory;
    }
}