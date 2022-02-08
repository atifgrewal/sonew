<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Player extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use Auditable;
    use HasFactory;

    public const DISABLE_PARTNER_RADIO = [
        '1' => 'Disable',
        '2' => 'Partner',
    ];

    public $table = 'players';

    protected $appends = [
        'profilephoto',
    ];

    protected $dates = [
        'dob',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name_id',
        'childparent_id',
        'dob',
        'adress_line_1',
        'address_line_2',
        'city',
        'disable_partner',
        'disability_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function name()
    {
        return $this->belongsTo(User::class, 'name_id');
    }

    public function childparent()
    {
        return $this->belongsTo(User::class, 'childparent_id');
    }

    public function getProfilephotoAttribute()
    {
        $file = $this->getMedia('profilephoto')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getDobAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDobAttribute($value)
    {
        $this->attributes['dob'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
