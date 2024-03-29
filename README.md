# Shopgate Storefront Plugin for Magento 2

This plugin enables merchants to easily offer click & reserve functionality in their Magento 2 Shop. 
It uses our [storefront javascript library](https://github.com/retail-red/storefront-library).
The script adds a “reserve” button to the product detail page, via which a new reservation can be placed.

## Installation
1. Download the [latest releases](https://github.com/retail-red/magento-2/releases/latest)
2. Unpack all contents of the zip file and copy content from `src` folder to `[mage root]/app/code/`.
    - structure should be `/app/code/Shopgate/ClickAndReserve`
3. Install module with magento cli
    ```sh
    cd [mage root folder]
    bin/magento module:enable Shopgate_ClickAndReserve
    bin/magento setup:upgrade
    bin/magento setup:di:compile
    bin/magento cache:clean
    ```
4. Open the config of our plugin in Magento Admin / Store / Configuration / Shopgate and enter your Storefront API Key and API stage.

## Configuration

Our plugin comes with a bunch of configuration options. The only setting that you must setup there is your API Key.
You will find your key in Shopgate Admin / Settings / General / Storefront API Key

All other settings are optional.
More details can be found here https://github.com/retail-red/storefront-library

## Support
Contact us via [support@shopgate.com](mailto:support@shopgate.com)

## Changelog
See [CHANGELOG.md](CHANGELOG.md) file for more information.
