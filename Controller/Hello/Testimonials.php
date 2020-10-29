<?php
namespace AHT\HelloWorld\Controller\Hello;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Testimonials extends Action 
{
    protected $_pageFactory;

    function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);   
    }

    public function execute()
    {
        return $this->_pageFactory->create();
    }
}