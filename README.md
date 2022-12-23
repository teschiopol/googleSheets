[![CodeFactor](https://www.codefactor.io/repository/github/teschiopol/googlesheets/badge)](https://www.codefactor.io/repository/github/teschiopol/googlesheets)

# 📊 googleSheets
Connection to read, write and update Google Sheets.

Code: PHP 

## 📗 Requirements
- Composer https://getcomposer.org/
- Account and Credentials for Google Sheets API on https://console.cloud.google.com/

## 📒 Configuration
1) Install ```composer require 'google/apiclient'```
2) Copy json key of service account in credentials.json
3) Update your parameters in config.php
4) Remember to share your Google sheet with service account's email

## 📔 Usage

### 📥 Read

Method GET

You can specify a range on query ```?range=A3:B5```.

### 📤 Write

Method POST

Specify operation type on body.

#### 📘 Update

Need range on body ```range=A3:B5```.

#### 📚 Append
