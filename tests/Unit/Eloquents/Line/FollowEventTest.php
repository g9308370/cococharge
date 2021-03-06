<?php

namespace Tests\Unit\Eloquents\Line;

use App\Eloquents\Line\FollowEvent;
use App\Eloquents\Line\LineAccount;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FollowEventTest extends TestCase
{
    use RefreshDatabase;

    public function testFactory()
    {
        $events = factory(FollowEvent::class, 5)->create();

        $this->assertEquals($events->count(), 5);
    }

    public function testOriginDataCast()
    {
        $event = factory(FollowEvent::class)->create();

        $jsonArray = ['a' => 'test', 'b' => 1];

        $event->origin_data = $jsonArray;

        $this->assertEquals('test', $event->origin_data->a);
        $this->assertEquals(1, $event->origin_data->b);
    }

    public function testTimestampDate()
    {
        $event = factory(FollowEvent::class)->create();
        $event->timestamp = 1528383950;

        $this->assertInstanceOf(Carbon::class, $event->timestamp);
    }

    public function testBelongsToLineAccount()
    {
        $event = factory(FollowEvent::class)->create();
        $account = factory(LineAccount::class)->create();

        $event->lineAccount()->associate($account)->save();

        $this->assertEquals($account->id, $event->lineAccount->id);
    }
}
