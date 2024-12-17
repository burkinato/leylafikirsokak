<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_number', 
        'email', 
        'address', 
        'working_hours', 
        'social_links'
    ];

    protected $casts = [
        'social_links' => 'array', // Sosyal medya linklerini JSON olarak saklarız
    ];
}
