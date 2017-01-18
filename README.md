[![Latest Stable Version](https://poser.pugx.org/rmanara/opencart_ide/v/stable)](https://packagist.org/packages/rmanara/opencart_ide)
[![Total Downloads](https://poser.pugx.org/rmanara/opencart_ide/downloads)](https://packagist.org/packages/rmanara/opencart_ide)
[![License](https://poser.pugx.org/rmanara/opencart_ide/license)](https://packagist.org/packages/rmanara/opencart_ide)
[![Latest Unstable Version](https://poser.pugx.org/rmanara/opencart_ide/v/unstable)](https://packagist.org/packages/rmanara/opencart_ide)
# opencart-ide

Create to help you identify magic method names on Opencart

## using composer require 
```
composer require rmanara/opencart_ide
```


### or just add it on composer like this
```
{
    "name": "opencart/opencart",
    ...
    "require": {
    ...
    "rmanara/opencart_ide" : "^1.0"
    }
}
```
### add script on composer so it will run it for you on update/install

```
{
    "name": "opencart/opencart",
    ...
    "require": {
    ...
    },
    "scripts": {
        "post-install-cmd": [
            "IDE\\Installer::Init"
        ],
        "post-update-cmd": [
            "IDE\\Installer::Init"
        ]
    }
}
```
### after run "composer install" you will see th
```
Loading composer repositories with package information
Installing dependencies (including require-dev) from lock file
Nothing to install or update
Generating autoload files
> IDE\Installer::Init
```
## then go to any controller and check


