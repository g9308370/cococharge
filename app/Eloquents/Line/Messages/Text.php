<?php

namespace App\Eloquents\Line\Messages;

use App\Contracts\Line\IMessage;
use App\Eloquents\Eloquent;
use App\Eloquents\Line\MessageEvent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Text extends Eloquent implements IMessage
{
    protected $table = 'line_message_texts';

    protected $fillable = [
        'event_id',
        'message_id',
        'type',
        'text',
    ];

    public function messageEvent(): BelongsTo
    {
        return $this->belongsTo(MessageEvent::class, 'event_id');
    }

    public function getReverseRelationName(): string
    {
        return 'text';
    }
}
