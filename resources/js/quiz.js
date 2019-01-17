let topicArray = {};

let setNextQuestionData = function(questionData) {
    //let parsedResponse = JSON.parse(response);
    //let questionData = parsedResponse[0];
    let questionIndex = Math.floor(Math.random() * questionData.length)
    let currentQuestion = questionData[questionIndex];
    document.getElementById("question").innerHTML = currentQuestion.question;
    return setHiddenQuestionData(currentQuestion.answer, currentQuestion.id, currentQuestion.topic_id, questionIndex);
};

let checkIfModulesInQuestionPool = function() {
    let questionData = questionPool;
    let question = document.getElementById("question");
    if(questionData === false) {
        question.innerHTML = "None of your modules are loaded into the question pool!";
        return false;
    } else {
        setNextQuestionData(questionData);
        return true;
    }
};

let setQuizFunctionalityOnLoad = function() {
    if(checkIfModulesInQuestionPool()) {
        document.getElementById("submit").onclick = submitButtonOnClick;
        document.getElementById("showAnswer").onclick = showAnswerOnClick;
        document.getElementById("nextQuestion").onclick = nextButtonOnClick;
        document.getElementById("saveButton").onclick = updateTopicScores;
    }
};
window.onload = setQuizFunctionalityOnLoad;

let  setHiddenQuestionData = function(answer, questionId, moduleId, index) {
    let hiddenData = document.getElementById("hiddenData");
    hiddenData.dataset.questionAnswer = answer;
    hiddenData.dataset.questionId = questionId;
    hiddenData.dataset.moduleId = moduleId;
    hiddenData.dataset.index = index;
};

function TopicScore(id, right, wrong, count) {
    this.id = id,
    this.right = right,
    this.wrong = wrong,
    this.count = count
}

let createTopicScoreObjectsArray = function(questionData) {
    let topicIdArray = [];
    let questionDataLength = questionData.length;
    let topicIdArrayLength;
    for (var i = 0; i < questionDataLength; i++) {
        if (topicIdArray.indexOf(questionData[i]["topic_id"]) === -1) {
            topicIdArray.push(questionData[i]["topic_id"]);
        }
    }

    topicIdArrayLength = topicIdArray.length;
    for (var j = 0; j < topicIdArrayLength; j++) {
        let topic = new TopicScore(topicIdArray[j], 0, 0, 0, 0);
        let topicId = topicIdArray[j].toString();
        topicArray[topicId] = topic;
    }
};

(function setInitialQuestionData() {
    if(checkIfModulesInQuestionPool()) {
        let questionData = questionPool;
        let answer = questionData[0].answer;
        let questionId = questionData[0].id;
        let moduleId = questionData[0].module_id;

        createTopicScoreObjectsArray(questionData);

        return setHiddenQuestionData(answer, questionId, moduleId);
    }
}());

let incrementTopicCounts = function() {
    let hiddenElement = document.getElementById("hiddenData");
    let currentTopic = topicArray[hiddenElement.dataset.moduleId];
    let topicCount = currentTopic.count;
    let topicRight = currentTopic.right;
    let topicWrong = currentTopic.wrong;

    topicCount++;

    if (hiddenElement.dataset.answerState === "correct") {
        topicRight++;
    } else {
        topicWrong++;
    }
    currentTopic.count = topicCount;
    currentTopic.right = topicRight;
    currentTopic.wrong = topicWrong;
}

let setRatioBarWidth = function(rightCount, wrongCount) {
    "use strict";
     let greenWidth = Math.round((100/(rightCount + wrongCount)) * rightCount).toString() + "%";
     let redWidth = "100%";
     document.getElementById("ratioGreen").style.width = greenWidth;
     document.getElementById("ratioRed").style.width = redWidth;
     document.getElementById("ratio").innerHTML = "Correct/Incorrect ratio: " + rightCount + "/" + wrongCount;
};

let incrementSessionScore = (function() {
    let rightCount = 0;
    let wrongCount = 0;

    return function(answerState) {
      if(answerState === "correct") {
          rightCount += 1;
      } else {
          wrongCount += 1;
      }
      return setRatioBarWidth(rightCount, wrongCount);
    }
})();

let setAnswerState = function(answerState) {
    return document.getElementById("hiddenData").dataset.answerState = answerState;
};

let setSubmittedState = function(boolString) {
    return document.getElementById("hiddenData").dataset.submitted = boolString;
};

let getSubmittedState = function() {
    return document.getElementById("hiddenData").dataset.submitted;
}

let displayAnswerState = function(answerState) {
    var userAnswer = document.getElementById("userAnswer");
    if(answerState === "correct") {
        userAnswer.style.color = "green";
    } else {
        userAnswer.style.color = "red";
    }
    userAnswer.disabled = "disabled";
    return userAnswer.value = answerState;
};

let displayErrorMessage = function(message) {
    return document.getElementById("errorMessage").innerHTML = message;
};

let submitButtonOnClick = function() {
    let userAnswer = document.getElementById("userAnswer").value;
    let actualAnswer = document.getElementById("hiddenData").dataset.questionAnswer;
    let answerState;

    if(userAnswer.trim() === actualAnswer.trim()) {
        answerState = "correct";
    } else {
        answerState = "incorrect";
    }

    setAnswerState(answerState);
    setSubmittedState("true");
    displayAnswerState(answerState);
    displayErrorMessage("");
    incrementTopicCounts();
    return incrementSessionScore(answerState);
};

let showAnswerOnClick = function() {
    if(getSubmittedState() === "true") {
        let userAnswer = document.getElementById("userAnswer");
        let actualAnswer = document.getElementById("hiddenData").dataset.questionAnswer;
        userAnswer.style.color = "#000";
        return userAnswer.value = actualAnswer;
    } else {
        return displayErrorMessage("You haven't submitted an answer yet!");
    }
};

let resetUserAnswer = function() {
    var userAnswer = document.getElementById("userAnswer");
    userAnswer.value = "";
    userAnswer.style.color = "#000";
    userAnswer.disabled = "";
};

let createPOSTParameters = function() {
    let hiddenData = document.getElementById("hiddenData");
    let answer_state = hiddenData.dataset.answerState;
    let question_id = hiddenData.dataset.questionId;
    let module_id = hiddenData.dataset.moduleId;
    return "answer_state=" + answer_state + "&question_id=" + question_id + "&module_id=" + module_id;
};

let fetchQuestionsAjax = function() {

    let postParameters = createPOSTParameters();
    let csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    let request = new XMLHttpRequest();
    request.onreadystatechange = function() {
      if(request.readyState === 4 && request.status === 200) {
          var response = request.response;
          setSubmittedState("false");
          resetUserAnswer();
          return setNextQuestionData(response);
      }
    };
    request.open("POST", "quiz", true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.setRequestHeader("X-CSRF-TOKEN", csrfToken);
    request.send(postParameters);
};

let nextButtonOnClick = function() {
    let questionData = questionPool;
    if(getSubmittedState() === "true") {
        setSubmittedState("false");
        resetUserAnswer();
        return setNextQuestionData(questionData);
    }  else {
        return displayErrorMessage("You haven't submitted an answer yet!");
    }
};

let updateTopicScores = function() {
    //let postParameters = createPOSTParameters();
    let csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    let request = new XMLHttpRequest();
    request.open("POST", "/topic/score", true);
    request.setRequestHeader("Content-type", "application/json");
    request.setRequestHeader("X-CSRF-TOKEN", csrfToken);
    request.send(JSON.stringify(topicArray));
};
