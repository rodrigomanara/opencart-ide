# opencart-ide

Create to help you identify magic method names on Opencart

## how to run 
```
composer require rmanara/opencart_ide @dev
```
### or
### add it on composer like this
```
{
    "name": "opencart/opencart",
    ...
    "require": {
    ...
    "rmanara/opencart_ide" : "@dev"
    },
    "scripts": {
        "post-install-cmd": [
            "ComposerScript\\Installer::Init"
        ],
        "post-update-cmd": [
            "ComposerScript\\Installer::Init"
        ]
    }
}

```
## add script on composer so it will run it for you on update/install
```
{
    "name": "opencart/opencart",
    ...
    "require": {
    ...
    },
    "scripts": {
        "post-install-cmd": [
            "ComposerScript\\Installer::Init"
        ],
        "post-update-cmd": [
            "ComposerScript\\Installer::Init"
        ]
    }
}
```
