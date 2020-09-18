<?php
    namespace Transom\SieteBarrios\Plugin;
    use Transom\Pakke\Logger\Logger;
    use Magento\Framework\Exception\StateException;
    use Magento\Store\Model\StoreManagerInterface;
    class QuotePlugin
    {
    
        /**
         * @var \Psr\Log\LoggerInterface
         */
        private $logger;

        protected $_storeManager; 
    
        public function __construct(Logger $logger, StoreManagerInterface $storeManager)
        {
            $this->logger = $logger;
            $this->_storeManager = $storeManager;
        }

        public function getWebsiteId()
        {
            return $this->_storeManager->getStore()->getWebsiteId();
        }

        public function getStoreCode()
        {
            return $this->_storeManager->getStore()->getCode();
        }
    
        public function beforeAddProduct(
            \Magento\Quote\Model\Quote $subject,
            \Magento\Catalog\Model\Product $product,
            $request = null,
            $processMode = \Magento\Catalog\Model\Product\Type\AbstractType::PROCESS_MODE_FULL
        ) {
            $storeCode = $this->getStoreCode();
            //  $this->logger->info("WEBSITE ID " . $storeCode);
            if($storeCode == "sietebarrios_storeview_main"){
                $productId = $product->getId();
                //  $this->logger->info("Product ID " . $productId);

                if($productId == "32" ){

                    if($request){
                        // $this->logger->info("BUNDLE PRODUCT QTY REQUEST BEFORE: " . $request->getData('qty'));
                        // $this->logger->info("BUNDLE OPTION REQUEST BEFORE: " . json_encode($request->getData('bundle_option')));
                        // $this->logger->info("BUNDLE OPTION QTY REQUEST BEFORE: " . json_encode($request->getData('bundle_option_qty')));
                        $items = $request->getData('bundle_option_qty');
                        $totalProducts = 0;
                        foreach($items as $item) {
                            // $this->logger->info("Product qty " . $item);
                            $totalProducts += $item;
                        }
        
                        // $this->logger->info("TOTAL: " . $totalProducts);
        
                         if ($totalProducts < 24 ||  $totalProducts > 24) {
                            throw new StateException(__('El paquete solo puede contener 24 cervezas'));
                         }
                        else {
                            return [$product, $request, $processMode];
                        } 
                        
                    }

                }

                if($productId == "29"){

                    if($request){
                        // $this->logger->info("BUNDLE PRODUCT QTY REQUEST BEFORE: " . $request->getData('qty'));
                        // $this->logger->info("BUNDLE OPTION REQUEST BEFORE: " . json_encode($request->getData('bundle_option')));
                        // $this->logger->info("BUNDLE OPTION QTY REQUEST BEFORE: " . json_encode($request->getData('bundle_option_qty')));
                        $items = $request->getData('bundle_option_qty');
                        $totalProducts = 0;
                        foreach($items as $item) {
                            // $this->logger->info("Product qty " . $item);
                            $totalProducts += $item;
                        }
        
                        // $this->logger->info("TOTAL: " . $totalProducts);
        
                        if ($totalProducts < 7 ||  $totalProducts > 7) {
                            throw new StateException(__('El paquete solo puede contener 7 cervezas'));
                        }
                        else {
                            return [$product, $request, $processMode];
                        }
                        
                    }

                }

            }
             
                return [$product, $request, $processMode];
            
             
        }
    
    }