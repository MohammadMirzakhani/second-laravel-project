<?php

namespace App\Listeners;

use App\Events\PostMessageEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PostMessageListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PostMessageEvent  $event
     * @return void
     */
    public function handle(PostMessageEvent $event)
    {
        if($event->post->id % 2 == 0)
        {
            message('عملیات با موفقیت بر روی پست صورت گرفت','warning');
        }
        else
        {
            message('عملیات با موفقیت بر روی پست صورت گرفت','info');
        }

    }
}
