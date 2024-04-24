<?php

namespace App\Models;

use DateTimeInterface;
use App\Traits\HasStatuses;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectPlan extends Model
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

    public $table = 'project_plans';

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

        'new_budget',
        'new_duration',

        'budget_currency',
        'project_id',
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

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format(config('panel.datetime_format'));
    }
}
