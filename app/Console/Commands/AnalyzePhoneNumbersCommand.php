<?php

namespace App\Console\Commands;

use App\Services\PhoneAnalysisService;
use Illuminate\Console\Command;

class AnalyzePhoneNumbersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'phone:analysis';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Analyze and categorize all customer phone numbers';

    public function __construct(
        private PhoneAnalysisService $analysisService
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting Customers Phone Numbers Analysis...');

        try {
            $this->analysisService->analyzeAllCustomers();
            $this->info('Analysis completed successfully!');
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->error('Customer Phone Analysis Failed failed: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
}
