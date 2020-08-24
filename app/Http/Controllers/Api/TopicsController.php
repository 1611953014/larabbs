<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Queries\TopicQuery;
use App\Http\Requests\Api\TopicRequest;
use App\Http\Resources\TopicResource;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TopicsController extends Controller
{
    /**
     * 话题列表
     * @param TopicQuery $topicQuery
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(TopicQuery $topicQuery)
    {
        $topics = $topicQuery->paginate();
        return TopicResource::collection($topics);
    }

    /**
     * 某个用户的话题列表
     * @param User $user
     * @param TopicQuery $topicQuery
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function userIndex(User $user, TopicQuery $topicQuery)
    {
        $topics = $topicQuery->where('user_id',$user->id)->paginate();
        return TopicResource::collection($topics);
    }

    /**
     * 获取话题详情
     * @param $topicId
     * @param TopicQuery $topicQuery
     * @return TopicResource
     */
    public function show($topicId,TopicQuery $topicQuery)
    {
        $topic = $topicQuery->findOrFail($topicId);
        return new TopicResource($topic);
    }

    /**
     * 新增话题
     * @param TopicRequest $request
     * @param Topic $topic
     * @return TopicResource
     */
    public function store(TopicRequest $request, Topic $topic)
    {
        $topic->fill($request->all());
        $topic->user_id = $request->user()->id;
        $topic->save();
        return new TopicResource($topic);
    }

    /**
     * 更改话题
     * @param TopicRequest $request
     * @param Topic $topic
     * @return TopicResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(TopicRequest $request, Topic $topic)
    {
        $this->authorize('update', $topic);

        $topic->update($request->all());
        return new TopicResource($topic);
    }

    /**
     * 删除话题
     * @param Topic $topic
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Topic $topic)
    {
        $this->authorize('destroy', $topic);

        $topic->delete();
        return response(null, 204);
    }
}
