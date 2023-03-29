<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Objects extends Model
{
    use HasApiTokens, Notifiable;
//    protected $table = 'objects';
    protected $fillable = [
        'user_id',
        'employee_id',
        'client_name',
        'client_number',
        'address',
        'postcode',
        'city_id',
        'key_number',
        'start_date',
        'phone_number',
        'google_map_url',
        'implementaion_time',
        'from_time',
        'rotation_type',
        'pdf',
        'contact_person_name',
        'contact_person_phone_number',
        'status'
    ];
}
