<?php
namespace Sunnydevbox\Boticajohn;

use Sunnydevbox\TWCore\BaseServiceProvider;

class BoticajohnServiceProvider extends BaseServiceProvider
{


	public function registerProviders()
	{
		// $loader = \Illuminate\Foundation\AliasLoader::getInstance();

        if (class_exists('\Sunnydevbox\TWCore\TWCoreServiceProvider')
            && !$this->app->resolved('\Sunnydevbox\TWCore\TWCoreServiceProvider')
        ) {
            $this->app->register(\Sunnydevbox\TWCore\TWCoreServiceProvider::class);
        }

        if (class_exists('\Sunnydevbox\TWUser\TWUserServiceProvider')
            && !$this->app->resolved('\Sunnydevbox\TWUser\TWUserServiceProvider')) {
            $this->app->register(\Sunnydevbox\TWUser\TWUserServiceProvider::class);
        }

        if (class_exists('\Stevebauman\Inventory\InventoryServiceProvider')
            && !$this->app->resolved('\Stevebauman\Inventory\InventoryServiceProvider')) {
            $this->app->register(\Stevebauman\Inventory\InventoryServiceProvider::class);
        } 
	}

}