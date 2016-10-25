# opencart-ide

Create to help you identify magic method names on Opencart

## how to run 

composer require rmanara/opencart_ide @dev


## add script on composer so it will it for you on update/install

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
