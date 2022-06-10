<?php
namespace Shopgate\ClickAndReserve\Helper;

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

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    /**
     * Data constructor.
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Framework\App\Helper\Context $context
     */
    public function __construct(
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\App\Helper\Context $context
    )
    {
        $this->storeManager = $storeManager;
        parent::__construct($context);
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function getConfig($key)
    {
        return $this->scopeConfig->getValue($key, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->storeManager->getStore()->getCurrentCurrencyCode();
    }

    /**
     * Returns locale in format lang-territory, eg. en-us, en-uk
     * @return string
     */
    public function getLocaleCode()
    {
        $om = \Magento\Framework\App\ObjectManager::getInstance();
        /** @var \Magento\Framework\Locale\Resolver $resolver */
        $resolver = $om->get(\Magento\Framework\Locale\Resolver::class);
        $locale = $resolver->getLocale();
        return strtolower(
            substr($locale, 0, 2)
            . '-'
            . substr($locale, 3, 2)
        );
    }
}
