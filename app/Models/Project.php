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
        'overview',
        'context',
        'justification',
        'description',

        'global_objective',
        'objectives',

        'outcomes',
        'logical_context',
        'intervention_strategies',
        'quality_monitoring',
        'partners',
        'performance_matrix',
        'budget_plan',
        'calendar',

        'duration',
        'budget',
        'budget_currency',
        'user_id',
    ];

    protected $casts = [
        'objectives' => 'array',
        'outcomes' => 'array',
        'logical_context' => 'array',
        'budget_plan' => 'array',
        'partners' => 'array',
        'performance_matrix' => 'array',
        'calendar' => 'array',
        'quality_monitoring' => 'array',
        'intervention_strategies' => 'array',
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
