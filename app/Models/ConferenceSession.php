<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConferenceSession extends Model
{
    use HasFactory;

    protected $table = 'sessions';

    protected $fillable = [
        'conference_id', 'title_ar', 'title_en', 'theme_ar', 'theme_en', 'date', 'start_time', 'end_time', 'hall_name_ar', 'hall_name_en', 'chair_member_id', 'order_number', 'created_by',
    ];

    protected $casts = [
        'date' => 'date',
        'start_time' => 'datetime:H:i:s',
        'end_time' => 'datetime:H:i:s',
    ];

    public function conference()
    {
        return $this->belongsTo(Conference::class);
    }

    public function chair()
    {
        return $this->belongsTo(Member::class, 'chair_member_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
