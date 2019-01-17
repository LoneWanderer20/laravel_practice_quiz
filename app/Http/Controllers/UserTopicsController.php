<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Topic;
use App\Events\RemoveSubjectEvent;

class UserTopicsController extends Controller
{
    public function index()
    {
        $userTopics = User::find(auth()->user()->id)->topic;
        $topics = Topic::all()->diff($userTopics);

        return view('add_topic', compact('topics'));
    }

    public function addTopic(Topic $topic)
    {
        auth()->user()->topic()->attach($topic);

        return redirect('topics')->with('success', 'You have added a new subject. Now get learning!');
    }

    public function removeTopic(Topic $topic)
    {
        auth()->user()->topic()->detach($topic->id);

        event(new RemoveSubjectEvent($topic->name));

        return redirect('topics')->with('success', 'You have removed a subject!');
    }
}
