<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ar', 'title_en', 'session_number', 'hijri_year', 'gregorian_year', 'start_date', 'end_date', 'venue_name_ar', 'venue_name_en', 'venue_address_ar', 'venue_address_en', 'themes', 'description_ar', 'description_en', 'status', 'logo_path', 'created_by', 'updated_by',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }

    public function sessions()
    {
        return $this->hasMany(ConferenceSession::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function mediaCampaigns()
    {
        return $this->hasMany(MediaCampaign::class);
    }

    public function committees()
    {
        return $this->hasMany(Committee::class);
    }

    public function badgesKits()
    {
        return $this->hasMany(BadgesKit::class);
    }

    public function correspondences()
    {
        return $this->hasMany(Correspondence::class);
    }
}
