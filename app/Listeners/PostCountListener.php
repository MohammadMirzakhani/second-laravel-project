<?php

namespace App\Listeners;

use App\Events\PostCountEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PostCountListener
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

    public $post;

    public function handle(PostCountEvent $event)
    {
        $this->post = $event->post;
        $this->post->count+=1;
        $this->post->save();

    }
}
