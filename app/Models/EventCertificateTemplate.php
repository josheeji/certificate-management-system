<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCertificateTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'url', 'custom_field', 'template_name'
    ];

    public function events()
    {
        return $this->hasMany(Event::class, 'event_id');
    }


}
