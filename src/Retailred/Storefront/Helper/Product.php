<?php
/**
 * Copyright Shopgate GmbH.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 *
 * @copyright 2021 Shopgate GmbH
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 */

namespace Retailred\Storefront\Helper;

use Magento\ConfigurableProduct\Model\ResourceModel\Product\Type\Configurable\Product\Collection as ConfigurableProductCollection;
use Magento\Framework\App\ObjectManager;

class Product extends \Magento\Framework\App\Helper\AbstractHelper
{
    private static $cacheKeyProductVariantsCollection = '_cache_retailred_storefront_variants';

    /**
     * Get variants collection for configurable product
     * @param \Magento\Catalog\Model\Product $product
     * @param array $attributesToSelect
     * @return ConfigurableProductCollection
     */
    public function getProductVariants(\Magento\Catalog\Model\Product $product, array $attributesToSelect = [])
    {
        if (!$product->hasData(static::$cacheKeyProductVariantsCollection)) {
            $objectManager = ObjectManager::getInstance();
            /** @var ConfigurableProductCollection $productCollection */
            $productCollection = $objectManager->get(ConfigurableProductCollection::class);

            $collection = $productCollection->setFlag('product_children', true)
                ->setProductFilter($product)
                ->addAttributeToSelect($attributesToSelect)
                ->setStoreId($product->getStoreId());

            $product->setData(static::$cacheKeyProductVariantsCollection, $collection);
        }
        return $product->getData(static::$cacheKeyProductVariantsCollection);
    }
}
