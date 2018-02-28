<?php
namespace Sunnydevbox\Boticajohn\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Illuminate\Support\Facades\Artisan;

class MigrateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'boticajohn:migrate {--action=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'BoticaJohn - run migration';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    { 
        $this->info('Running BoticaJohn migration files...');

        $action = $this->option('action');
    
        if ($action) {

            $method = ($action == 'run') ? '' : (($action) ? ':' . $action : '');

            $exitCode = Artisan::call('migrate' . $method, [
                '--path'    => 'vendor/sunnydevbox/boticajohn-package/src/Database/Migrations',
            ]);

            $this->info(app('Illuminate\Contracts\Console\Kernel')->output());
            
            $this->info(' ... BoticaJohn migration DONE');
        } else {
            $this->error('Migration failed');
            $this->line('- You must specify the --action option [run/install/refresh/reset/rollback/status]');
        }
        
    }

    public function fire()
    {
        echo 'fire';
    }
}