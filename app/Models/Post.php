<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements Hasmedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;


    protected $fillable = [
        'id_submenu',
        'id_user',
        'judul',
        'isi',
        'file',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user')->withTrashed();
    }

    public function submenu(): BelongsTo
    {
        return $this->belongsTo(Submenu::class, 'id_submenu')->withTrashed();
    }
}
