<?php

/**
 * @Author: Ngo Quang Cuong
 * @Date:   2017-07-28 04:17:09
 * @Last Modified by:   nquangcuong
 * @Last Modified time: 2017-07-28 04:42:33
 */

namespace PHPCuong\ReturnPolicyTab\Block\Product;

class ReturnPolicy extends \Magento\Framework\View\Element\Template
{
    /**
     * Store manager
     *
     * @var StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $data = []
    ) {
        $this->storeManager = $storeManager;
        parent::__construct($context, $data);

        $this->setTabTitle();
    }

    /**
     * Set tab title
     *
     * @return void
     */
    public function setTabTitle()
    {
        $this->setTitle(__('Return Policy'));
    }

    /**
     * Get the content of the block
     *
     * @return string
     */
    public function getTheContent()
    {
        $content = $this->getLayout()->createBlock('Magento\Cms\Block\Block')->setBlockId('return-policy')->toHtml();
        if (empty($content)) {
            return __('Please update the content for this tab on the %1 store view', $this->storeManager->getStore()->getName());
        }
        return $content;
    }
}
