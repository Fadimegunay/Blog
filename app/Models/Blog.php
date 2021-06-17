<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_description',
        'description',
        'photo',
        'user_id',
        'is_active'
    ];

    public function user() {
	    return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function previous() {
        $blog = Blog::where('is_active', true)
                    ->where('id','<', $this->id)
                    ->orderBy('id', 'DESC')->first();
        if($blog)
            return $blog->id;
        else
            return null;
    }

    public function next() {
        $blog = Blog::where('is_active', true)
                    ->where('id','>', $this->id)
                    ->orderBy('id')->first();
        if($blog)
            return $blog->id;
        else
            return null;
    }
}
