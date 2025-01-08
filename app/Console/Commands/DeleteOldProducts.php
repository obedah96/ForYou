<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Domain\Entities\Product;
use Carbon\Carbon;


class DeleteOldProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-old-products';
    

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes products older than 60 days';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cutoffDate = Carbon::now()->subDays(60);
        Product::where('created_at', '<', $cutoffDate)->delete();
        $this->info('Old products deleted successfully.');
    
    }
}
