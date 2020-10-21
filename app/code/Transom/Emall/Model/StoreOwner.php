<?php
namespace Transom\Emall\Model;
class StoreOwner extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'store_owner_emall';

	protected $_cacheTag = 'store_owner_emall';

	protected $_eventPrefix = 'store_owner_emall';

	public function _construct()
	{
		$this->_init("Transom\Emall\Model\ResourceModel\StoreOwner");
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}