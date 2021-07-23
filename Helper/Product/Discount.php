<?php
namespace DNAFactory\CatalogUtils\Helper\Product;

use DNAFactory\CatalogUtils\Api\ProductDiscountManagementInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\Exception\NotFoundException;
use Magento\Framework\Phrase;

class Discount extends AbstractHelper
{
    /**
     * @var ProductDiscountManagementInterface
     */
    protected $productDiscountManagement;

    /**
     * @param Context $context
     * @param ProductDiscountManagementInterface $productDiscountManagement
     */
    public function __construct (
        Context $context,
        ProductDiscountManagementInterface $productDiscountManagement
    ) {
        parent::__construct($context);
        $this->productDiscountManagement = $productDiscountManagement;
    }

    /**
     * @param \Magento\Catalog\Api\Data\ProductInterface $product
     * @return int
     */
    public function getPercentage($product): int
    {
        return $this->productDiscountManagement->getPercentage($product);
    }
}
