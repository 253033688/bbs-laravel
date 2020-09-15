<?php

namespace App\Services\user\ds\traits;

use Illuminate\Foundation\Validation\ValidatesRequests;

Trait userBlackTrait
{
    use ValidatesRequests;

    protected $rules = [];
    protected $messages = [];

    public static function boot()
    {
        parent::boot();

        static::created(function ($topic) {
            SiteStatus::newTopic();
        });
    }
}