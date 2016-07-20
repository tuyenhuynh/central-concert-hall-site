<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Feedback;

class FeedbackController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function feedbacks() {
        $feedbacks = Feedback::all();
        return view('admin.feedbacks.index', compact('feedbacks'));
    }

    public function feedback($id) {
        $feedback = Feedback::find($id);
        return view('admin.feedbacks.show', compact('feedback'));
    }

    public function deleteFeedback($id) {
        Feedback::destroy($id);
        return redirect('/admin/feedbacks') ;
    }


}
