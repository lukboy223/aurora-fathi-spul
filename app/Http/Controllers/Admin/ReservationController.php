<?php

// app/Http/Controllers/Admin/ReservationController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return view('admin.placeholder', ['section' => 'Reserveringen']);
    }
}
