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

namespace Shopgate\ClickAndReserve\Block;

use Shopgate\ClickAndReserve\Helper\Data;
use Shopgate\ClickAndReserve\Model\Config;

class Product extends \Magento\Catalog\Block\Product\View\AbstractView
{
    /**
     * @var \Shopgate\ClickAndReserve\Helper\Product
     */
    protected $productHelper;

    public function __construct(
        \Magento\Catalog\Block\Product\Context $context,
        \Magento\Framework\Stdlib\ArrayUtils $arrayUtils,
        \Shopgate\ClickAndReserve\Helper\Product $productHelper
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

        $identifiers = $helper->getConfig(Config::XML_PATH_GENERAL_PRODUCT_IDENTIFIERS);
        if (!empty($identifiers)) {
            $identifiers = explode(',', $identifiers);
        } else {
            $identifiers = [];
        }

        $currentProduct = $this->getProduct();
        $data = [
            $currentProduct->getId() => [
                'name' => $currentProduct->getName(),
                'type' => 'standard',
                'number' => $productField === 'sku'
                    ? $currentProduct->getSku()
                    : $currentProduct->getId(),
                'identifiers' => [
                    'sku' => $currentProduct->getSku()
                ]
            ]
        ];
        if (!empty($identifiers)) {
            foreach ($identifiers as $identifier) {
                $data[$currentProduct->getId()]['identifiers'][$identifier] = $currentProduct->getData($identifier);
            }
        }

        if($currentProduct->getTypeId() === \Magento\ConfigurableProduct\Model\Product\Type\Configurable::TYPE_CODE) {
            $data[$currentProduct->getId()]['type'] = 'configurable';
            $variants = $this->productHelper->getProductVariants($currentProduct, $identifiers);
            foreach ($variants as /* @var \Magento\Catalog\Model\Product $variant */ $variant) {
                $data[$variant->getId()] = [
                    'name' => $variant->getName(),
                    'type' => 'standard',
                    'number' => $productField === 'sku'
                        ? $variant->getSku()
                        : $variant->getId(),
                    'identifiers' => [
                        'sku' => $currentProduct->getSku()
                    ]
                ];
                if (!empty($identifiers)) {
                    foreach ($identifiers as $identifier) {
                        $data[$variant->getId()]['identifiers'][$identifier] = $variant->getData($identifier);
                    }
                }
            }
        }
        return $data;
    }
}
