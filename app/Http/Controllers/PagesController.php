<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Topic;
use App\Question;
use App\Events\RemoveSubjectEvent;

class PagesController extends Controller
{
    public function home()
    {
        return view('Auth/login');
    }

    public function topics()
    {
        $topics = User::find(auth()->user()->id)->topic;

        foreach ($topics as $topic) {
            $topic["latest_score"] = $topic->pivot->latest_score;
            $topic["overall_score"] = $topic->pivot->overall_score;
        }

        return view('topics', compact('topics'));
    }

    public function topic_questions(Request $request, Topic $topic)
    {
        $questions = Question::where('topic_id', $topic->id)->get();

        return view('topic_questions', compact(['questions', 'topic']));
    }

    public function show_add_topic()
    {
        $userTopics = User::find(auth()->user()->id)->topic;
        $topics = Topic::all()->diff($userTopics);

        return view('add_topic', compact('topics'));
    }

    public function add_topic(Topic $topic)
    {
        auth()->user()->topic()->attach($topic);

        return redirect('topics')->with('success', 'You have added a new subject. Now get learning!');
    }

    public function remove_topic(Request $request)
    {
        $topic = json_decode($request->topic);

        auth()->user()->topic()->detach($topic->id);

        //Mail::to(auth()->user())->queue(new QuizScore($topic->name));

        event(new RemoveSubjectEvent($topic->name));

        return redirect('topics')->with('success', 'You have removed a subject!');
    }

    public function question_pool()
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

        return view('question_pool', compact('question_pool'));
    }

    public function add_to_pool(Topic $topic)
    {
        auth()->user()->topic()->updateExistingPivot($topic, ['in_pool' => 1]);

        return $this->question_pool();
    }

    public function remove_from_pool(Topic $topic)
    {
        auth()->user()->topic()->updateExistingPivot($topic, ['in_pool' => 0]);

        return $this->question_pool();
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

        return response()->json($request);
    }
}
