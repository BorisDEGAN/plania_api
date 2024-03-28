<?php

namespace App\Models;

use DateTimeInterface;
use App\Traits\HasStatuses;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use SoftDeletes, HasStatuses, HasFactory;

    public const PENDING_STATE = "pending";
    public const STARTED_STATE = "accepted";
    public const CANCELED_STATE = "canceled";
    public const FINISHED_STATE = "finished";

    public const STATES = [
        self::PENDING_STATE,
        self::STARTED_STATE,
        self::CANCELED_STATE,
        self::FINISHED_STATE,
    ];

    public $table = 'projects';

    protected $fillable = [
        'title',
        'description',
        'context',
        'outcomes',
        'steps',
        'steps_planning',
        'budget',
        'budget_planning',
        'budget_notes',
        'activities',
        'user_id',        
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'outcomes' => 'array',
        'steps' => 'array',
        'steps_planning' => 'array',
        'budget' => 'array',
        'budget_planning' => 'array',
        'budget_notes' => 'array',
        'activities' => 'array',
    ];

    protected $appends = [
        'status'
    ];

    public function getStatusAttribute()
    {
        return $this->status()?->name;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format(config('panel.datetime_format'));
    }
}