<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;


/**
 * App\Models\Link
 *
 * @property int $id ID
 * @property string $title 资源的描述
 * @property string $link 资源的链接
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Link disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Link newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Link newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Link query()
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link withCacheCooldownSeconds($seconds = null)
 * @mixin \Eloquent
 */
class Link extends Model
{
    use Cachable;

    protected $cachePrefix = "links";

    protected $fillable = ['title', 'link'];

    protected $cache_expire_in_seconds = 1440 * 60;

    public function getAllCached()
    {
        // 尝试从缓存中取出 cache_key 对应的数据。如果能取到，便直接返回数据。
        // 否则运行匿名函数中的代码来取出 links 表中所有的数据，返回的同时做了缓存。
        return Cache::remember($this->cachePrefix, $this->cache_expire_in_seconds, function(){
            return $this->all();
        });
    }
}
