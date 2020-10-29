<?php
namespace AHT\HelloWorld\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Collection extends Action
{
    protected $_pageFactory;

    function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);  
    }

    public function execute()
    {   
        $productCollection = $this->_objectManager->create('Magento\Catalog\Model\ResourceModel\Product\Collection')->setPageSize(10,1);
        $output = '';
        foreach ($productCollection as $product) {
        $output .= Zend_Debug::dump($product->debug(), null, false);
        }
        $this->getResponse()->setBody($output);

        // return $this->_pageFactory->create();
    }
}