<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('Auth/login');
    }

    public function topics()
    {
        return view('topics');
    }

    public function add_topic()
    {
        return view('add_topic');
    }

    public function question_pool()
    {
        return view('question_pool');
    }

    public function quiz()
    {
        return view('quiz');
    }


}
