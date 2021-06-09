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
 * @copyright 2021 Shopgate GmbH
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 */

namespace Retailred\Storefront\Block;

use Retailred\Storefront\Helper\Data;
use Retailred\Storefront\Model\Config;

class Product extends \Magento\Catalog\Block\Product\View\AbstractView
{
    /**
     * @var \Retailred\Storefront\Helper\Product
     */
    protected $productHelper;

    public function __construct(
        \Magento\Catalog\Block\Product\Context $context,
        \Magento\Framework\Stdlib\ArrayUtils $arrayUtils,
        \Retailred\Storefront\Helper\Product $productHelper
    ) {
        $this->productHelper = $productHelper;
        parent::__construct($context,$arrayUtils);
    }

    /**
     * Get Product detail page config
     * @return array
     */
    public function getProductsConfig()
    {
        $helper = \Magento\Framework\App\ObjectManager::getInstance()->get(Data::class);
        $productField = $helper->getConfig(Config::XML_PATH_API_PRODUCT_CODE_MAPPING);

        $currentProduct = $this->getProduct();
        $fields = ['name', 'sku'];
        $data = [
            $currentProduct->getId() => $currentProduct->toArray($fields)
        ];
        $data[$currentProduct->getId()]['number'] = $productField === 'sku'
            ? $currentProduct->getSku()
            : $currentProduct->getId();

        if($currentProduct->getTypeId() === \Magento\ConfigurableProduct\Model\Product\Type\Configurable::TYPE_CODE) {
            $variants = $this->productHelper->getProductVariants($currentProduct);
            foreach ($variants as /* @var \Magento\Catalog\Model\Product $variant */ $variant) {
                $data[$variant->getId()] = $variant->toArray($fields);
                $data[$variant->getId()]['number'] = $productField === 'sku'
                    ? $variant->getSku()
                    : $variant->getId();

            }
        }
        return $data;
    }
}
