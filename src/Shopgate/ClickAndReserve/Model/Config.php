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

namespace Shopgate\ClickAndReserve\Model;

class Config
{
    const XML_PATH_API_APIKEY = 'shopgate_clickandreserve/api/apiKey';
    const XML_PATH_API_API_STAGE = 'shopgate_clickandreserve/api/apiStage';
    const XML_PATH_API_UNIT_SYSTEM = 'shopgate_clickandreserve/api/unitSystem';
    const XML_PATH_API_PRODUCT_CODE_MAPPING = 'shopgate_clickandreserve/api/productCodeMapping';
    const XML_PATH_API_COUNTRIES = 'shopgate_clickandreserve/api/countries';
    const XML_PATH_API_BROWSER_HISTORY = 'shopgate_clickandreserve/api/browserHistory';
    const XML_PATH_API_USE_GEOLOCATION_IMMEDIATELY = 'shopgate_clickandreserve/api/useGeolocationImmediately';
    const XML_PATH_API_TEST_MODE = 'shopgate_clickandreserve/api/testMode';

    const XML_PATH_GENERAL_RENDER = 'shopgate_clickandreserve/general/render';
    const XML_PATH_GENERAL_RENDER_MODE = 'shopgate_clickandreserve/general/renderMode';
    const XML_PATH_GENERAL_SAVE_CUSTOMER_DATA = 'shopgate_clickandreserve/general/saveCustomerData';
    const XML_PATH_GENERAL_INVENTORY_HIDE_NUMBER = 'shopgate_clickandreserve/general/inventoryHideNumber';
    const XML_PATH_GENERAL_INVENTORY_SHOW_EXACT_UNTIL = 'shopgate_clickandreserve/general/inventoryShowExactUntil';
    const XML_PATH_GENERAL_INVENTORY_SHOW_LOW_UNTIL = 'shopgate_clickandreserve/general/inventoryShowLowUntil';
    const XML_PATH_GENERAL_TERMS_LINK = 'shopgate_clickandreserve/general/termsLink';
    const XML_PATH_GENERAL_PRIVACY_LINK = 'shopgate_clickandreserve/general/privacyLink';
    const XML_PATH_GENERAL_PRODUCT_IDENTIFIERS = 'shopgate_clickandreserve/general/productIdentifiers';

    const XML_PATH_DESIGN_COLORS = 'shopgate_clickandreserve/design/colors';
    const XML_PATH_DESIGN_TRANSLATIONS = 'shopgate_clickandreserve/design/translations';

    const RENDER_DISABLED = 'disabled';
    const RENDER_RESERVE_BUTTON = 'reserveButton';
    const RENDER_LIVE_INVENTORY = 'liveInventory';

    const RENDER_MODE_MODAL = 'modal';
    const RENDER_MODE_LIST = 'list';
}
