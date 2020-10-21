<?php

namespace Transom\Emall\Controller\Index;

use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Framework\App\Action\Action;
 use Magento\Framework\App\Action\Context;
 use Magento\Framework\View\Result\PageFactory;
 use Magento\Framework\Filesystem;
 use Magento\Framework\App\Filesystem\DirectoryList;
 use Magento\Framework\Controller\ResultFactory; 
use Psr\Log\LoggerInterface;
use Transom\Emall\Model\StoreOwner;

class SendStoreOwnerForm extends Action
{
	
	  /**
     * @var TransportBuilder
     */
    protected $transportBuilder;

    /**
     * @var LoggerInterface
     */
	protected $logger;

    /**
     * @var PageFactory
     */
	protected $resultPageFactory;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $productRepository;

    /**
     * @var \Magento\Product\Model\ProductFactory
     */
    protected $productFactory;

    /**
     * @var \Magento\CatalogInventory\Api\StockRegistryInterface
     */
    protected $stockRegistry;
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    private $storeManager;

    private $post;
    /**
     * @var Data
     */
    protected $customerSession;

    protected $_storeOwner;

    protected $_messageManager;

    protected $resultFactory;

    /**
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Catalog\Api\ProductRepositoryInterface $productRepository ,
     * @param \Magento\Catalog\Api\Data\ProductInterfaceFactory $productFactory
     * @param \Magento\CatalogInventory\Api\StockRegistryInterface $stockRegistry
     * @param \Magento\MediaStorage\Model\File\UploaderFactory $fileUploaderFactory
     * @param Filesystem $filesystem
     * @param \Magento\Framework\App\Action\Context $context
     * @param PageFactory $pageFactory
     * @param LoggerInterface $logger
     * @param TransportBuilder $transportBuilder
     * @param Data $customerSession
     * @param StoreOwner $storeOwner
     */
    public function __construct(
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        \Magento\Catalog\Api\Data\ProductInterfaceFactory $productFactory,
		\Magento\CatalogInventory\Api\StockRegistryInterface $stockRegistry,
		\Magento\MediaStorage\Model\File\UploaderFactory $fileUploaderFactory,
		\Magento\Framework\Filesystem $filesystem,
		Context $context, 
		PageFactory $pageFactory,
		LoggerInterface $logger,
        TransportBuilder $transportBuilder,
        \Transom\Emall\Model\StoreOwnerFactory $storeOwner,
        \Magento\Framework\Message\ManagerInterface $messageManager,
        \Magento\Framework\Controller\ResultFactory $resultFactory

    ) {

		$this->logger = $logger;
		$this->transportBuilder = $transportBuilder;
        $this->storeManager     = $storeManager;
        $this->productRepository     = $productRepository;
        $this->productFactory  = $productFactory;
        $this->resultPageFactory = $pageFactory;
        $this->stockRegistry = $stockRegistry;
        $this->_storeOwner = $storeOwner;
        $this->_messageManager = $messageManager;
        $this->resultFactory = $resultFactory;

        parent::__construct($context);
    }
  
    public function execute()
    {
        $post = $this->getRequest()->getPostValue();
        $model = $this->_storeOwner->create();

        $template_id = "";

        if($post["form_type"] == "A"){
            $template_id = "Transom_Emall_Store_Owner";
            $formData = array(
                'customer_name'=>$post["name"],
                'business'=>$post["business"],
                'business_line'=>$post["business_line"],
                'website_address'=>$post["web_address"],
                'facebook'=>$post["facebook"],
                'instagram'=>$post["instagram"],
                'email'=>$post["email"],
                'phone_number'=>$post["telephone"],
                'business_phone_number'=>$post["telephone_business"],
                'zip_code'=>$post["zip_code"],
                'state'=>$post["state"],
                'city'=>$post["city"],
                'suburb'=>$post["suburb"],
                'form_type'=>$post["form_type"]
            );
        }

        if($post["form_type"] == "B"){
            $template_id = "Transom_Emall_Store_Owner_B";
            $formData = array(
                'customer_name'=>$post["name"],
                'business'=>$post["business"],
                'email'=>$post["email"],
                'phone_number'=>$post["telephone"],
                'form_type'=>$post["form_type"],
                'employees_amount'=>$post["employees_amount"],
            );
        }

        

      /*Send email to admin*/
      
      $receiverInfo = [
        'name' => 'Admin',
        'email' => 'ovazquez@transom-group.com'
        ];

        
        $emails = ['ovazquez@transom-group.com','ecommercesupport@transom-group.com']; //users that will receive the email
        $store = $this->storeManager->getStore();

        $transport = $this->transportBuilder->setTemplateIdentifier(
            $template_id
        )->setTemplateOptions(
            ['area' => 'frontend', 'store' => $store->getId()]
        )->addTo(
            $emails, $receiverInfo['name']
        )->setTemplateVars(
            $formData
        )->setFrom(
            'general'
        )->getTransport();


        try {
            // Send an email
            $transport->sendMessage();
            $storeobject = $model->setData($formData)->save();
            
            $redirect = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);
            $redirect->setUrl('/landingpage#thank-you');
            return $redirect;
            
        } catch (\Exception $e) {
            // Write a log message whenever get errors
            $this->logger->critical($e->getMessage());
        }
		
    }
}