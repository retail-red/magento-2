# Retail.red Integration for Magento2

### Installation using a release zip file

- Unpack all contents of the zip file to `[mage root]/app/code/`.
- Install module with magento cli

```sh
cd [mage root folder]
bin/magento module:enable Shopgate_RrOmniEnablement
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento cache:clean
```
