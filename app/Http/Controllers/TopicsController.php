<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Topic;
use App\Question;

class TopicsController extends Controller
{
    public function index()
    {
        $topics = User::find(auth()->user()->id)->topic;

        foreach ($topics as $topic) {
            $topic["latest_score"] = $topic->pivot->latest_score;
            $topic["overall_score"] = $topic->pivot->overall_score;
        }

        return view('topics', compact('topics'));
    }

    public function show(Topic $topic)
    {
        $questions = Question::where('topic_id', $topic->id)->get();

        return view('topic_questions', compact(['questions', 'topic']));
    }
}
