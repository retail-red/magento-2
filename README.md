# Retail.red Storefront Integration for Magento2
This plugin enables merchants to easily offer click & reserve functionality in their Shopware 6 Shop. 
It uses our [storefront javascript library](https://github.com/retail-red/storefront-library).
The script adds a “reserve” button to the product detail page, via which a new reservation can be placed.


### Installation using a release zip file

- Unpack all contents of the zip file to `[mage root]/app/code/`.
- Install module with magento cli

```sh
cd [mage root folder]
bin/magento module:enable Retailred_Storefront
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento cache:clean
```

## Support
Contact us via [mail@retail.red](mailto:mail@retail.red)

## Changelog
See [CHANGELOG.md](CHANGELOG.md) file for more information.
