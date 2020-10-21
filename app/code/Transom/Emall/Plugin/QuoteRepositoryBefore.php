<?php
namespace Transom\Emall\Plugin;
class QuoteRepositoryBefore{

protected $storeManager;

public function __construct( 
    \Magento\Store\Model\StoreManagerInterface $storeManager
){
    $this->storeManager = $storeManager;
}

public function beforeGet(
    \Magento\Quote\Model\QuoteRepository $quoteRepository, 
     $cartId, 
     array $sharedStoreIds
){
    return [$cartId, [$this->storeManager->getStore()->getId()]];
}
}