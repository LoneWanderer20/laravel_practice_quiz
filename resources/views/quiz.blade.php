@extends('layouts.app')
<link href="{{ asset('css/quiz.css') }}" rel="stylesheet">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Quiz</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="quizCont" class="quizCont">

                       <div class="questionCont">
                           <p id="question"></p>
                	     </div>

                        <div id="controlsCont">
                           <input class="inputClass buttonClass btn-primary" type="button" id="submit" value="Submit"/>
                           <input class="inputClass" type="text" id="userAnswer" autocomplete="off" />
                           <input class="inputClass buttonClass btn-primary" type="submit" id="nextQuestion" value="Next Question"/>
                           <input class="inputClass buttonClass btn-primary" type="button" id="showAnswer" value="Show Answer" />

                                 <div class="ratioClass" id="ratioDiv">
                                     <div class="ratioRed" id="ratioRed"></div>
                                     <div class="ratioGreen" id="ratioGreen"></div>
                                     <p id="ratio">Correct/Incorrect ratio:</p>
                                 </div>

                                 <a  href="/quiz/question_pool">
                                     <input id="backButton" class="inputClass buttonClass bottomButton bottomLeft btn-primary" type="button" value="Back" />
                                 </a>

                                <input id="saveButton" class="inputClass buttonClass bottomButton bottomRight btn-primary" type="button" value="Finish" />
                		  </div>

                     </div>
                     <p class="errorMessage" id="errorMessage"></p>

                      <input type=hidden id="hiddenData" data-question-answer=""
                      data-question-id="" data-module-id="" data-answer-state="" data-submitted="" data-index/>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text\javascript">
    let questionPool = {!! json_encode($questions) !!};
</script>
<script type="text/javascript" src="/js/quiz.js"></script>
@endsection
