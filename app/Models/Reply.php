<?php

namespace App\Models;


/**
 * App\Models\Reply
 *
 * @property int $id ID
 * @property int $topic_id 话题ID
 * @property int $user_id 用户ID
 * @property string $content 回复内容
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Topic $topic
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Reply newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reply newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Model ordered()
 * @method static \Illuminate\Database\Eloquent\Builder|Reply query()
 * @method static \Illuminate\Database\Eloquent\Builder|Model recent()
 * @method static \Illuminate\Database\Eloquent\Builder|Reply whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reply whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reply whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reply whereTopicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reply whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reply whereUserId($value)
 * @mixin \Eloquent
 */
class Reply extends Model
{
    protected $fillable = ['content'];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
