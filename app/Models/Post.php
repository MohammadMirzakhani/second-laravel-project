<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;
    public $directory="/storage/Image/";
    protected $fillable = [
        'name',
        'body',
        'password',
    ];


    public function imagesx()
    {
        return $this->morphMany(Image::class,'imageable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getRouteKeyName()
    {
        return 'name';
    }
    //Accessore

    //Mutator
    public function setbodyattribute($value)
    {
        $this->attributes['body'] = strrev($value);
        //return strrev($value); =>  درست نیست
    }
    public function setnameattribute($value)
    {
        if(request()->isMethod('post'))
        {
            $this->attributes['name'] = strrev($value);
        }
        else
        {
            $this->attributes['name'] = $value;
        }
        //return strrev($value); =>  درست نیست
    }
    // public function setpathattribute($value)
    // {
    //     $this->attributes['path']= $this->directory.$value;
    // }


}
//dammahom ma I  inahkazrim dammahom
