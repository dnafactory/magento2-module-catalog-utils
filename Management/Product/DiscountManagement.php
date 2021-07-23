<?php
namespace DNAFactory\CatalogUtils\Management\Product;

use DNAFactory\CatalogUtils\Api\ProductDiscountManagementInterface;
use Magento\Framework\Exception\NotFoundException;
use Magento\Framework\Phrase;

class DiscountManagement implements ProductDiscountManagementInterface
{

    /**
     * @param \Magento\Catalog\Api\Data\ProductInterface $product
     * @return int
     */
    public function getPercentage($product): int
    {
        try {
            if (!$product || !$product->getId()) {
                throw new NotFoundException(new Phrase(__("Product not found")));
            }

            $regularPrice = $product->getPriceInfo()->getPrice(\Magento\Catalog\Pricing\Price\RegularPrice::PRICE_CODE)->getAmount()->getValue();
            $finalPrice = $product->getPriceInfo()->getPrice(\Magento\Catalog\Pricing\Price\FinalPrice::PRICE_CODE)->getAmount()->getValue();

            if ($finalPrice < $regularPrice) {
                return round(100 - $finalPrice / $regularPrice * 100);
            }
        } catch (\Exception $e) {}
        return 0;
    }
}
