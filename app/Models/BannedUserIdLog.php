<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BannedUserIdLog extends Model {
    protected $fillable = ['part','status','ip'];
    public $timestamps = ["created_at"];
    const UPDATED_AT = null;
}