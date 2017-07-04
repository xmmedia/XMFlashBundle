# XMFlashBunlde
Makes adding & translating flash messages in Symfony simple.

## Installation

### Step 1: Download the Bundle

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
$ php composer.phar require xm/flash-bundle
```

This command requires [Composer](https://getcomposer.org/download/).

### Step 2: Enable the Bundle

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new XM\FlashBundle\XMFlashBundle(),
        );

        // ...
    }
}
```

### Step 3: Add Service Alias

Adding the following will make the call to the service shorter:

```
flash_handler: '@xm_flash.handler'
```

## Usage

**The handler will always pull messages from the default transation file,**
typically messages.

#### Just a message, no translation:

```
$this->get('flash_handler')->add('success', 'The record was saved.');
```

#### With translation message key and parameters:

```
$this->get('flash_handler')->add('success', 'app.message.entity_updated', ['%name%' => 'User']);
```
