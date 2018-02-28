<?php
namespace Sunnydevbox\Boticajohn;

use Sunnydevbox\TWCore\BaseServiceProvider;

class BoticajohnServiceProvider extends BaseServiceProvider
{

    /** OVERRIDE */
    public function mergeConfig()
    {
        return [
            __DIR__ . '/../config/config.php' => 'boticajohn'
        ];
    }

    /** 
     * OVERRIDE 
     */
    public function loadRoutes()
    {
        return [
            realpath(__DIR__.'/../routes/api.php')
        ];
    }

    /**
     * OVERRIDE
     */
    // public function loadViews()
    // {
    //     return [
    //         __DIR__.'/../resources/views' => 'newsdeeply'
    //     ];
    // } 

    public function registerCommands()
    {
        if ($this->app->runningInConsole()) {

            $this->commands([
                \Sunnydevbox\Boticajohn\Console\Commands\MigrateCommand::class,
                // \Sunnydevbox\NewsDeeply\Console\Commands\WPImportCommand::class,
                // \Sunnydevbox\NewsDeeply\Console\Commands\UpdateLPostsCommand::class,
            ]);
        }
    }

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

        if (class_exists('\Sunnydevbox\TWInventory\TWInventoryServiceProvider')
            && !$this->app->resolved('\Sunnydevbox\TWInventory\TWInventoryServiceProvider')) {
            $this->app->register(\Sunnydevbox\TWInventory\TWInventoryServiceProvider::class);
        }
    }

}