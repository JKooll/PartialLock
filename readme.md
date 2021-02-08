# Partial Lock
Partial Lock is a WordPress article encryption plugin, which can encrypt part of the article content.

## Scenarios
1. After entering the password, the download link of the paid resource is displayed.
2. After entering the password, the private reading content is displayed.

## Installation
Go to the **WordPress Admin Console**, open the plugin management panel, click **Install plugin** -> **Upload plugin**, enable the plugin after uploading successfully

## Usage
Insert the shortcode in the article in the following format:
```
[secret key="put your password in here" tip="Enter password to unlock encrypted content"]Put the content to be encrypted between the two tags[/secret]
```
Parameters:
```
key: the password to unlock private content
tip: custom prompt message
```

## Developers
- JKol ([Github](https://github.com/JKooll))
