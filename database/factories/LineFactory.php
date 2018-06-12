<?php

use App\Eloquents\Line\FollowEvent;
use App\Eloquents\Line\Hookevent;
use App\Eloquents\Line\JoinEvent;
use App\Eloquents\Line\LeaveEvent;
use App\Eloquents\Line\LineText;
use App\Eloquents\Line\LineUser;
use App\Eloquents\Line\MessageEvent;
use App\Eloquents\Line\Messages\Text;
use App\Eloquents\Line\UnfollowEvent;
use Carbon\Carbon;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(LineText::class, function (Faker $faker) {
    return [
        'line_user_id' => factory(LineUser::class)->create()->id,
        'hookevent_id' => factory(Hookevent::class)->create()->id,
        'line_id' => str_random(20),
    ];
});

$factory->define(JoinEvent::class, function (Faker $faker) {
    return [
        'type' => 'join',
        'reply_token' => str_random(20),
        'timestamp' => Carbon::now(),
        'source_type' => $faker->word,
        'source_id' => str_random(20),
        'origin_data' => str_random(20),
    ];
});

$factory->define(LeaveEvent::class, function (Faker $faker) {
    return [
        'type' => 'leave',
        'timestamp' => Carbon::now(),
        'source_type' => $faker->word,
        'source_id' => str_random(20),
        'origin_data' => str_random(20),
    ];
});

$factory->define(FollowEvent::class, function (Faker $faker) {
    return [
        'type' => 'follow',
        'reply_token' => str_random(20),
        'timestamp' => Carbon::now(),
        'source_type' => $faker->word,
        'source_id' => str_random(20),
        'origin_data' => str_random(20),
    ];
});

$factory->define(UnfollowEvent::class, function (Faker $faker) {
    return [
        'type' => 'unfollow',
        'timestamp' => Carbon::now(),
        'source_type' => $faker->word,
        'source_id' => str_random(20),
        'origin_data' => str_random(20),
    ];
});

$factory->define(MessageEvent::class, function (Faker $faker) {
    return [
        'type' => 'message',
        'reply_token' => str_random(20),
        'timestamp' => Carbon::now(),
        'source_type' => $faker->word,
        'source_id' => str_random(20),
        'origin_data' => str_random(20),
    ];
});

$factory->define(Text::class, function (Faker $faker) {
    $message_event = factory(MessageEvent::class)->create();

    return [
        'event_id' => $message_event->id,
        'message_id' => (string)$faker->numberBetween(100000, 999999),
        'type' => 'text',
        'text' => $faker->sentence,
    ];
});
