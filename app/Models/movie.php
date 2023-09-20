<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class movie extends Model
{
    use HasFactory;

    Protected $primaryKey='Imdb_id';

    // public function get_data(Request $req){
    //         return p($req[]);
    // }
}
