<?php

namespace App\Models;
use Illuminate\Support\Facades\Gate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsAdmin extends Model
{
    use HasFactory;

    public function isAdmin()
    {
        if(! Gate::allows('admin')) {
            abort(403);
        }
    }
}
