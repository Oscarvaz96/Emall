<?php
namespace Transom\Emall\Model\ResourceModel;

class StoreOwner extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb{

	public function __construct(\Magento\Framework\Model\ResourceModel\Db\Context $context)
	{
		parent::__construct($context);
	}

	protected function _construct()
	{
		$this->_init("store_owner_emall", "store_owner_id");
	}

	
}