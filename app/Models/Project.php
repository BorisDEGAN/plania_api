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
        'justification',
        'duration',
        'global_objective',
        'objectives',   
        'outcomes',
        'activities',
        'logical_context',
        'budget_plan',
        'budget',
        'budget_currency',
        'intervention_strategy',
        'quality_monitoring',
        'patners',
        'performance_matrix',
        'calendar',
        'user_id',        
    ];

    protected $casts = [
        'objectives' => 'array',
        'outcomes' => 'array',
        'activities' => 'array',
        'logical_context' => 'array',
        'budget_plan' => 'array',
        'patners' => 'array',
        'performance_matrix' => 'array',
        'calendar   ' => 'array',
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