<?php

namespace App\Traits;

use App\Models\Media;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasMedia
{
    public function addMedia()
    {
        if (request()->hasFile('attachments')) {
            collect(request()->attachments)->each(function ($attachment) {
                $attachment->store('media/' . auth()->id() . '/' . now()->format('Y') . '/' . now()->format('m'), 'public');

                $this->media()->save(
                    Media::create([
                        'filename' => $attachment->hashName(),
                        'mime_type' => $attachment->getMimeType(),
                        'size' => $attachment->getSize(),
                        'user_id' => auth()->id()
                    ])
                );
            });
        }
    }

    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'model');
    }
}