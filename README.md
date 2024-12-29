# Aimes_Substratum

!["Supported Magento Version"][magento-badge] !["Supported Adobe Commerce Version"][commerce-badge] !["Latest Release"][release-badge]

- Compatible with _Magento Open Source_ and _Adobe Commerce_ `2.4.x`
- Compatible with Mage OS

> **NOTE: This module provides no out-of-the-box functionality. All features are opt-in and exist purely for the benefit of other modules to utilise.**

## Features
- A top-level admin menu item for all `Aimes` modules, for ease-of-access. By default, this is disabled. This is to prevent unnecessary menu clutter for those who only have a small number of modules.
- An abstracted Composer package information provider, primarily used for update checks
- A custom `SymfonyStyle` class for easy access to helper methods, reducing 'clutter' when developing custom CLI commands and resulting in cleaner code
- A basic, yet accessible, collapsible UI component and accompanying template
- A 'navigator' model that provides observable values for:
  - Battery level
  - Battery charging status
  - Network status
 
Further details on each of the features can be found on the [Substratum Wiki][wiki].

## Requirements

* Magento Open Source or Adobe Commerce version `2.4.x`

## Installation

> **NOTE: This module should only be installed as the result of a dependent module installation.**
> 
> Dependant modules can be found on [Packagist][dependents].

Please install this module via Composer. This module is hosted on [Packagist][packagist].
If for some reason you still want to install this module independently, then please follow the below steps.

* `composer require aimes/magento2-module-substratum`
* `bin/magento module:enable Aimes_Substratum`
* `bin/magento setup:upgrade`

## Usage

Please see the [Substratum Wiki][wiki] for usage instructions.

## Preview
- ...

## Planned Features / Improvments
- ...

## Licence
[GPLv3][gpl] © [Rob Aimes][author]

[magento-badge]:https://img.shields.io/badge/Magento-2.4.x-orange.svg?logo=Magento&style=for-the-badge
[commerce-badge]:https://img.shields.io/badge/Adobe%20Commerce-2.4.x-red.svg?logo=Adobe&style=for-the-badge
[release-badge]:https://img.shields.io/github/v/release/robaimes/magento2-module-substratum
[packagist]:https://packagist.org/packages/aimes/magento2-module-substratum
[dependents]:https://packagist.org/packages/aimes/magento2-module-substratum/dependents?order_by=downloads
[gpl]:https://www.gnu.org/licenses/gpl-3.0.en.html
[author]:https://aimes.dev/
[wiki]:https://github.com/robaimes/magento2-module-substratum/wiki
