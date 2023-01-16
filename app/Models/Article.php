<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable=["title", "slug", "body", "subject_id", "user_id"];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function subject()
    {
        $this->belongsTo(Subject::class);
    }
}
