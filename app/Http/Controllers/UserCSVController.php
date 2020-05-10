<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
class UserCSVController extends Controller
{
    public function userCSV()
    {
        $users = User::all(); // All users
        $csvExporter = new \Laracsv\Export();
        $csvExporter->build($users, ['name', 'email', 'created_at'])->download();
    }
}
