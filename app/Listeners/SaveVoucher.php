<?php

namespace App\Listeners;

use App\Mail\VouchersCreatedMail;
use App\Services\VoucherService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class SaveVoucher implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;
    protected $voucherService;
/**
 * Create a new job instance.
 *
 * @return void
 */
    public function __construct($details)
    {
        $this->details = $details;
        $this->voucherService = new VoucherService;
    }
/**
 * Execute the job.
 *
 * @return void
 */
    public function handle()
    {

        $item = $this->details;

        $xmlContents = $item['xmlContents'];
        $user = $item['user'];

        $vouchers = [];
        foreach ($xmlContents as $xmlContent) {
            $vouchers[] = $this->storeVoucherFromXmlContent($xmlContent, $user);
        }

        $mail = new VouchersCreatedMail($vouchers,$voucher, $user);
        Mail::to($user->email)->send($mail);

        return $vouchers;

        # return $this->details;

    }

}
