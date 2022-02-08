<?php

function message($message,$level='info')
{
    session()->flash('message',$message);
    session()->flash('message_level',$level);
}
