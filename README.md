# Kgkrunch_CmsRestriction

**Kgkrunch_CmsRestriction** is a Magento 2 security module that restricts CMS block and page updates via REST API to prevent unauthorized changes, bot-based exploits, or malware injection through API endpoints.

## 🔒 Purpose

Magento’s CMS pages and blocks are often targeted in automated or malicious attacks via the REST API. This module disables the ability to update these content areas via API, helping to prevent:

- Automated scripts from injecting malware
- Unauthorized users from modifying frontend content
- Accidental content tampering through exposed API endpoints

Only admin users using the Magento backend can modify CMS content — ensuring that changes remain under full administrative control.

## 🚀 Features

- ❌ **Blocks CMS page and block modification via REST API**
- ✅ **Admin panel access remains unaffected**
- 🛡️ **Prevents API-based malware injection attacks**
- 🔐 **Throws a detailed `AuthorizationException` on blocked calls**

## 📂 Module Structure

The module includes two plugins:

- `BlockRepositoryPlugin`: Restricts CMS block save actions via API
- `PageRepositoryPlugin`: Restricts CMS page save actions via API

Each plugin checks if the request is made from `webapi_rest` area and throws a secure exception if so.

## 🛠️ Installation

1. Copy the module to your Magento installation:
```bash
php bin/magento module:enable Kgkrunch_CmsRestriction
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy -f
php bin/magento cache:flush
