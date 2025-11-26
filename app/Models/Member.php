<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name_ar', 'first_name_en', 'last_name_ar', 'last_name_en', 'honorific_title_ar', 'honorific_title_en', 'academic_title_ar', 'academic_title_en', 'type', 'membership_date', 'nationality_id', 'passport_number', 'passport_expiry', 'email', 'phone', 'cv_text', 'photo_path', 'is_active',
    ];

    protected $casts = [
        'membership_date' => 'date',
        'passport_expiry' => 'date',
        'is_active' => 'boolean',
    ];

    public function nationality()
    {
        return $this->belongsTo(Country::class, 'nationality_id');
    }

    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }

    public function committees()
    {
        return $this->belongsToMany(Committee::class, 'committee_members')->withPivot('role');
    }
}
