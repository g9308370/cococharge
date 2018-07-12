<?php

namespace App\Eloquents\Accounting;

use App\Contracts\Accounting\BillRecord;
use App\Eloquents\Eloquent;
use App\Traits\Accounting\BillRecordEloquent;

class Income extends Eloquent implements BillRecord
{
    use BillRecordEloquent;

    protected $table = 'incomes';

    protected $fillable = [
        'wallet_id',
        'amount',
    ];
}
