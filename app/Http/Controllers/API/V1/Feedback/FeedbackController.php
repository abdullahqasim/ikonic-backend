<?php

namespace App\Http\Controllers\API\V1\Feedback;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Feedback\FeedbackRequest;
use App\Models\Feedback;
use App\Services\FeedbackService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    use ResponseTrait;
    public function addFeedback(FeedbackRequest $request){
        try {
            $data = $request->all();
            $data['user_id'] = $request->user()->id;
            $feedback = Feedback::create($data);
            return $this->success(true, 'Feedback added successfully', $feedback);
        } catch (\Exception $e) {
            return $this->fail($e);
        }
    }

    public function getAllFeedback(){
        try {
            $feedbacks = Feedback::with('user')->paginate(8);
            return $this->success(true, 'All Feedback', $feedbacks);
        } catch (\Exception $e) {
            return $this->fail($e);
        }
    }

    public function getFeedback($id){
        try {
            $feedback = Feedback::find($id)->load('comments','comments.user');
            return $this->success(true, 'Get Feedback', $feedback);
        } catch (\Exception $e) {
            return $this->fail($e);
        }
    }
}
