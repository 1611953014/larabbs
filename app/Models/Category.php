<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Category
 *
 * @property int $id ID
 * @property string $name 名称
 * @property string|null $description 描述
 * @property int $post_count 贴子数
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category wherePostCount($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name','description'
    ];
}
