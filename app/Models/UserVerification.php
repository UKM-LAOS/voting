<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property boolean $status
 * @property string $full_name
 * @property string $nim
 * @property string $image
 * @property string $no_wa
 * @property int $year
 * @property string $program_study
 * @property string $created_at
 * @property string $updated_at
 * @property StatusVerification $statusVerification
 * @property User $user
 */
class UserVerification extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'status', 'full_name', 'nim', 'image', 'no_wa', 'year', 'program_study', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusVerification()
    {
        return $this->belongsTo('App\Models\StatusVerification', 'status');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('full_name', 'like', '%'.$query.'%')
                ->orWhere('status', 'like', '%'.$query.'%')
                ->orderBy('updated_at');
    }
}
