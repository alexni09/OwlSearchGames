<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannedEmailLog extends Model {
    use HasFactory;
    protected $fillable = ['part','operation','ip'];
    public $timestamps = ["created_at"];
    const UPDATED_AT = null;
}