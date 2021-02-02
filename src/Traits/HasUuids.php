<?php

namespace Digiservnet\EloquentHasUuids\Traits;

use Ramsey\Uuid\Uuid;

trait HasUuids
{
    public static function boot(): void
    {
        parent::boot();

        static::creating(static function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = Uuid::uuid4()->toString();
            }
        });
    }

    public function getIncrementing(): bool
    {
        return false;
    }

    public function getKeyType(): string
    {
        return 'uuid';
    }
}
