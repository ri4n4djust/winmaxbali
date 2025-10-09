<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //
    protected $table = "galeri";
    protected $fillable = ['id_album', 'nama_foto', 'deskripsi', 'foto', 'path'];	
}
