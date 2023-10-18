<?php

namespace App\Http\Controllers\Vouchers\Voucher;

use App\Http\Requests\Vouchers\DeleteVouchersRequest;
use App\Http\Resources\Vouchers\VoucherResource;
use App\Services\VoucherService;
use Illuminate\Http\Response;

class DeleteVoucherHandler
{
    public function __construct(private readonly VoucherService $voucherService)
    {
    }

    public function __invoke(DeleteVouchersRequest $request): Response
    {

        $id = $request->query('id');

        $voucher = $this->voucherService->deleteVoucher($id);

        if ($voucher == null) {
            return response([
                'message' => 'Comprobante '.$id .' no encontrado o ya fue eliminado.'
            ], 401);
        }

        return response([
            'message' => 'Comprobante '. $id.' eliminado.'
        ], 200);

        
    }
}
