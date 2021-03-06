<?php

namespace App\Eloquents\Line;

use App\Contracts\Line\ReplyableEvent;
use App\Contracts\Line\WebhookEvent;
use App\Eloquents\Eloquent;
use App\Traits\Line\ReplyableEventEloquent;
use App\Traits\Line\WebhookEventEloquent;

class FollowEvent extends Eloquent implements WebhookEvent, ReplyableEvent
{
    use WebhookEventEloquent, ReplyableEventEloquent;

    protected $table = 'line_follow_events';

    protected $fillable = [
        'line_account_id',
        'type',
        'reply_token',
        'timestamp',
        'source_type',
        'source_id',
        'origin_data',
    ];

    protected $dates = [
        'timestamp',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'origin_data' => 'object',
    ];
}
