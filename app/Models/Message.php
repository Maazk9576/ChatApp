<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message',
        'filename',
        'file_original_name',
        'folder_path',
        'is_read',
    ];

    /**
     * Get the sender (User).
     */
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    /**
     * Get the receiver (User).
     */
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {

            $model->created_at = Carbon::now();
        });

    }

}
