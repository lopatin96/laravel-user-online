<?php

namespace Atin\LaravelUserOnline\Traits;

trait HasOnline
{
    public function isOnline(): bool
    {
        return $this->last_seen_at ? $this->last_seen_at->diffInSeconds(now()) <= config('laravel-user-online.ttl') : false;
    }
}