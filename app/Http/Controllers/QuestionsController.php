<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Topic;
use App\Question;

class QuestionsController extends Controller
{
    public function quizQuestions()
    {
        $topics = auth()->user()->topic;

        $collection = collect();

        $inPool = $topics->filter(function (Topic $topic) {
            return $topic->pivot->in_pool;
        });

        $outPool = $topics->filter(function (Topic $topic) {
            return !$topic->pivot->in_pool;
        });

        $question_pool = [
            "in_pool" => array_values($inPool->toArray()),
            "out_pool" => array_values($outPool->toArray())
        ];

        return view('questions', compact('question_pool'));
    }

    public function addQuestionToQuiz(Topic $topic)
    {
        auth()->user()->topic()->updateExistingPivot($topic, ['in_pool' => 1]);

        return $this->quizQuestions();
    }

    public function removeQuestionFromQuiz(Topic $topic)
    {
        auth()->user()->topic()->updateExistingPivot($topic, ['in_pool' => 0]);

        return $this->quizQuestions();
    }

    public function quiz()
    {
        $topics = auth()->user()->topic()->where('in_pool', 1)->get()->toArray();
        $questions = collect([]);

        foreach ($topics as $topic) {
            $questions = $questions->merge(Question::where('topic_id', $topic["id"])->get());
        }
        return view('quiz', compact('questions'));
    }

    public function updateUserScores(Request $request)
    {
        //$response = $request[topic-index][property key];
        dd($request);

        return response()->json($request);
    }
}
