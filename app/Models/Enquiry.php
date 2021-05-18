<?php

namespace App\Models;

use A17\Twill\Models\Model;
use A17\Twill\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'company',
        'regarding',
        'phone',
        'message',
        'published',
        'title',
        'description',
        'read',
        'read_at',
        'read_by'
    ];

    public $nullable = [
        'read_at',
        'read_by'
    ];

    public $checkboxes = [
        'read'
    ];

    protected $dates = [
        'read_at',
    ];

    public function reader()
    {
        return $this->belongsTo(User::class, 'read_by');
    }

    public function scopeRead($query)
    {
        return $query->whereRead(true);
    }

    public function scopeUnread($query)
    {
        return $query->whereRead(false);
    }

    public function setRegardingAttribute($value)
    {
        $this->attributes['regarding'] = Str::title(str_replace('-', ' ', join(', ', $value)));
    }
}
