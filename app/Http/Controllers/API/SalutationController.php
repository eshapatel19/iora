<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Salutation;

class SalutationController extends Controller
{
    public function index()
    {
        return Salutation::all();
    }
}
