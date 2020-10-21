<?php
namespace Transom\Emall\Model\ResourceModel\StoreOwner;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'store_owner_id';
	protected $_eventPrefix = 'store_owner_emall_collection';
	protected $_eventObject = 'post_collection';
	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Transom\Emall\Model\StoreOwner', 'Transom\Emall\Model\ResourceModel\StoreOwner');
	}

}