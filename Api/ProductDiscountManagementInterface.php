<?php
namespace DNAFactory\CatalogUtils\Api;

interface ProductDiscountManagementInterface
{
    /**
     * @param \Magento\Catalog\Api\Data\ProductInterface $product
     * @return int
     */
    public function getPercentage($product): int;
}
