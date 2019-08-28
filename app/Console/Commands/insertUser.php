<?php

namespace App\Console\Commands;

use App\Mail\SendTotalAdmin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\TotalBillDate;
use Illuminate\Support\Facades\Mail;

class insertUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insertUser:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        //
        $totalBillDate = new TotalBillDate();

        $emailAdmin = config('app.emailAdmin');

        if ($totalBillDate->totalBillDate() != 0) {
            $this->info(Mail::to($emailAdmin)->send(new SendTotalAdmin($totalBillDate)));
        } else {
            $this->info('Hôm nay chưa bán được sản phẩm nào ');
        }
    }
}
