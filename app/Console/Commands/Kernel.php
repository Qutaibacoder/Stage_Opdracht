<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateKernelFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-kernel-file';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Maakt het Kernel.php bestand aan en configureert geplande opdrachten';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $kernelPath = app_path('Console/Kernel.php');

        // Define the content of the Kernel.php file
        $kernelContent = <<<'EOD'
<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\SendWeeklyEventSummary::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('weekly_events_report')->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
EOD;

        // Check if the Kernel.php file already exists
        if (file_exists($kernelPath)) {
            $this->info("Kernel.php already exists at $kernelPath");
        } else {
            // Create the directory if it does not exist
            if (!is_dir(dirname($kernelPath))) {
                mkdir(dirname($kernelPath), 0755, true);
            }

            // Write the content to the Kernel.php file
            file_put_contents($kernelPath, $kernelContent);
            $this->info("Kernel.php has been created at $kernelPath");
        }

    }
}
