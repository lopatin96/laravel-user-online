<?php

namespace Atin\LaravelLangSwitcher\Traits;

trait HasOnline
{
    public function online(): bool
    {
        return $this->last_seen_at ? $this->last_seen_at->diffInDays(now()) <= config('laravel-user-online.ttl') : false;
    }
}