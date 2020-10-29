<?php
namespace AHT\HelloWorld\Block;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;

class Hello extends Template
{
    protected $_collectionFactory;

    function __construct(
                        CollectionFactory $collectionFactory, 
                        Template\Context $context, 
                        array $data = []
    )
    {
        $this->_collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    public function productList()
    {
        $productList = $this->_collectionFactory->create();
        $productList->addAttributeToSelect('*')->setPageSize(5);
        return $productList;
    }
}