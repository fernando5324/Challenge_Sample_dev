<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VouchersCreatedMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public array $vouchers;
    public array $vouchers_not_register;
    public User $user;

    public function __construct(array $vouchers,array $vouchers_not_register, User $user)
    {
        $this->vouchers = $vouchers;
        $this->vouchers_not_register = $vouchers_not_register;
        $this->user = $user;
    }

    public function build(): self
    {
        return $this->view('emails.comprobante')
            ->with(['comprobantes' => $this->vouchers,'comprobantes_no_guardados'=>$vouchers_not_register, 'user' => $this->user]);
    }
}
