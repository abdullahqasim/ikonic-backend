<?php

namespace App\Http\Controllers\API\V1\Comments;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Comments\CommentsRequest;
use App\Models\Comment;
use App\Services\CommentService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    use ResponseTrait;
    public function addComment(CommentsRequest $request){
        try {
            $data = $request->all();
            $data['user_id'] = $request->user()->id;
            $comment = Comment::create($data);
            return $this->success(true, 'Comments added successfully', $comment);
        } catch (\Exception $e) {
            return $this->fail($e);
        }
    }
}
