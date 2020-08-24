<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ReplyRequest;
use App\Http\Resources\ReplyResource;
use App\Models\Reply;
use App\Models\Topic;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    /**
     * 新增回复
     * @param ReplyRequest $request
     * @param Reply $reply
     * @param Topic $topic
     * @return ReplyResource
     */
    public function store(ReplyRequest $request, Reply $reply, Topic $topic)
    {
        $reply->content = $request['content'];
        $reply->topic()->associate($topic);
        $reply->user()->associate($request->user());
        $reply->save();

        return new ReplyResource($reply);
    }

    public function destroy(Topic $topic, Reply $reply)
    {
        if ($reply->topic_id != $topic->id) {
            abort(404);
        }
        $this->authorize('destroy',$reply);
        $reply->delete();
        return response(null, 204);
    }
}
