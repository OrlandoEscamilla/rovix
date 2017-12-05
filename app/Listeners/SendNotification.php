<?php

namespace App\Listeners;

use App\Events\SendNotificationEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class SendNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  SendNotificationEvent $event
     * @return void
     */
    public function handle(SendNotificationEvent $event)
    {
        $notification = $event->notification;

        $fields = [
            'app_id' => $notification->app_id,
            'headings' => $notification->headings,
            'contents' => $notification->contents,
            'included_segments' => $notification->included_segments
        ];

        if (!is_null($notification->included_segments)) {
            $fields['included_segments'] = $notification->included_segments;
        }

        if (!is_null($notification->include_player_ids)) {
            $fields['include_player_ids'] = $notification->include_player_ids;
        }

        $fields = json_encode($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json; charset=utf-8",
            "Authorization: Basic " . env('ONESIGNAL_REST_API_KEY')));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);
        Log::info($response);
    }
}
