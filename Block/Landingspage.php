<?php 
namespace AHT\HelloWorld\Block;

use Magento\Framework\View\Element\Template;

class Landingspage extends Template
{
    public function getLandingsUrl()
    {
   	 return $this->getUrl('fr_helloworld');
    }
    public function getRedirectUrl()
    {
   	 return $this->getUrl('fr_helloworld/index/redirect');
    }
}