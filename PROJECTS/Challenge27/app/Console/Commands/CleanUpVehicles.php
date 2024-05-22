<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Vehicle;
use Carbon\Carbon;

class CleanUpVehicles extends Command
{
    protected $signature = 'vehicles:cleanup';
    protected $description = 'Delete soft-deleted and expired insurance vehicles';
    public function handle()
    {
        Vehicle::onlyTrashed()->where('deleted_at', '<', now())->forceDelete();

        Vehicle::where('insurance_date', '<', Carbon::today())->delete();

        $this->info('Expired and soft-deleted vehicles cleaned up successfully.');
    }
}
