<?php
/**
 * Copyright Shopgate Inc.
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
 * @author    Shopgate Inc, 804 Congress Ave, Austin, Texas 78701 <interfaces@shopgate.com>
 * @copyright 2019 Shopgate Inc
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 */

namespace Shopgate\RrOmniEnablement\Model;

class Config
{
    const XML_PATH_API_STATUS = 'retailred_omnienablement/api/status';
    const XML_PATH_API_APIKEY = 'retailred_omnienablement/api/apiKey';
    const XML_PATH_API_API_STAGE = 'retailred_omnienablement/api/apiStage';
    const XML_PATH_API_UNIT_SYSTEM = 'retailred_omnienablement/api/unitSystem';
    const XML_PATH_API_COUNTRIES = 'retailred_omnienablement/api/countries';

    const XML_PATH_GENERAL_INVENTORY_HIDE_NUMBER = 'retailred_omnienablement/general/inventoryHideNumber';
    const XML_PATH_GENERAL_INVENTORY_SHOW_EXACT_UNTIL = 'retailred_omnienablement/general/inventoryShowExactUntil';
    const XML_PATH_GENERAL_INVENTORY_SHOW_LOW_UNTIL = 'retailred_omnienablement/general/inventoryShowLowUntil';
    const XML_PATH_GENERAL_TERMS_LINK = 'retailred_omnienablement/general/termsLink';
    const XML_PATH_GENERAL_PRIVACY_LINK = 'retailred_omnienablement/general/privacyLink';

    const XML_PATH_DESIGN_COLORS = 'retailred_omnienablement/design/colors';
    const XML_PATH_DESIGN_TRANSLATIONS = 'retailred_omnienablement/design/translations';
}
