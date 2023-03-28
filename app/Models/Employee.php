<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'username',
        'password',
        'profile',
        'address',
        'zipcode',
        'region',
        'country_id',
        'phone_number',
        'join_date',
        'employee_number',
        'amount_of_vacation_days',
        'amount_of_hours_work',
        'status',
    ];

}
