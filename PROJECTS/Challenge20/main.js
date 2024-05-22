const loadingScreen = document.getElementById("loading-screen");
const startScreen = document.getElementById("start-screen");
const quizScreen = document.getElementById("quiz-screen");
const resultScreen = document.getElementById("result-screen");
const startButton = document.getElementById("start-button");
const questionElement = document.getElementById("question");
const categoryElement = document.getElementById("category");
const answersElement = document.getElementById("answers");
const progressLabel = document.getElementById("progress-label");
const correctAnswersElement = document.getElementById("correct-answers");
const startOverButton = document.getElementById("start-over");
const tryAgainButton = document.getElementById("try-again");

let questions = [];
let currentQuestionIndex = 0;
let correctAnswers = 0;

// function fetchQuestions() {
//   fetch("https://opentdb.com/api.php?amount=20")
//     .then((response) => response.json())
//     .then((data) => {
//       questions = data.results;
//       organizeQuestions();
//       hideElement(loadingScreen);
//       showElement(startScreen);

//       if (window.location.hash) {
//         const hash = window.location.hash;
//         if (hash === "#results") {
//           showResults();
//           console.log(showResults());
//         } else {
//           const questionNumber = parseInt(hash.substring(10), 10);
//           if (
//             !isNaN(questionNumber) &&
//             questionNumber > 0 &&
//             questionNumber <= questions.length
//           ) {
//             currentQuestionIndex = questionNumber - 1;
//             if (currentQuestionIndex === questions.length) {
//               showResults();
//             } else {
//               startQuiz();
//             }
//           }
//         }
//       }
//     })
//     .catch((error) => console.error(error));
// }

async function fetchQuestions() {
  try {
    const response = await fetch("https://opentdb.com/api.php?amount=20");
    const data = await response.json();
    questions = data.results;
    organizeQuestions();
    hideElement(loadingScreen);
    showElement(startScreen);

    if (window.location.hash) {
      const hash = window.location.hash;
      if (hash === "#results") {
        showResults();
      } else {
        const questionNumber = parseInt(hash.substring(10), 10);
        if (!isNaN(questionNumber > 0 && questionNumber <= questions.length)) {
          currentQuestionIndex = questionNumber - 1;
          if (currentQuestionIndex === questions.length) {
            showResults();
          } else {
            startQuiz();
          }
        }
      }
    }
  } catch (error) {
    console.error(error);
  }
}

function organizeQuestions() {
  const easyQuestions = questions.filter((q) => q.difficulty === "easy");
  const mediumQuestions = questions.filter((q) => q.difficulty === "medium");
  const hardQuestions = questions.filter((q) => q.difficulty === "hard");

  questions = [...easyQuestions, ...mediumQuestions, ...hardQuestions];
}
function showNextQuestion() {
  if (currentQuestionIndex < questions.length) {
    const question = questions[currentQuestionIndex];
    questionElement.innerHTML = question.question;
    categoryElement.innerHTML = `Category: ${question.category}`;
    answersElement.innerHTML = "";

    const answerOptions = [
      ...question.incorrect_answers,
      question.correct_answer,
    ];
    answerOptions.sort(() => Math.random() - 0.5);

    answerOptions.forEach((answer) => {
      const answerButton = document.createElement("button");
      answerButton.className = "btn btn-outline-dark m-3";
      answerButton.style.cursor = "pointer";
      answerButton.innerHTML = answer;
      answersElement.appendChild(answerButton);
      answersElement.className = "m-3 d-flex justify-content-around";
    });

    currentQuestionIndex++;
    updateProgressBar();

    window.location.hash = `#question-${currentQuestionIndex}`;
  } else {
    showResults();
  }
}

function updateProgressBar() {
  progressLabel.innerHTML = `<h1>Completed: ${currentQuestionIndex}/${questions.length}</h1>`;
}

function handleAnswerSelection(event) {
  const selectedAnswer = event.target.textContent;
  const currentQuestion = questions[currentQuestionIndex - 1];

  if (selectedAnswer === currentQuestion.correct_answer) {
    correctAnswers++;
    localStorage.setItem("correctAnswers", correctAnswers);
  }

  showNextQuestion();
}

function showResults() {
  hideElement(quizScreen);
  showElement(resultScreen);
  hideElement(startScreen);

  const savedCorrectAnswers = localStorage.getItem("correctAnswers");
  if (savedCorrectAnswers !== null) {
    correctAnswers = parseInt(savedCorrectAnswers, 10);
  }

  correctAnswersElement.innerHTML = `<h1>Total Correct Answers: ${correctAnswers}/20</h1>`;

  window.location.hash = "results";
}

function startQuiz() {
  hideElement(startScreen);
  showElement(quizScreen);
  showNextQuestion();
}
function hideElement(element) {
  element.style.display = "none";
}

function showElement(element) {
  element.style.display = "block";
}

startButton.addEventListener("click", startQuiz);
answersElement.addEventListener("click", handleAnswerSelection);

startOverButton.addEventListener("click", () => {
  localStorage.clear();
  const currentURL = window.location.href;

  if (currentURL.includes("#")) {
    const newURL = currentURL.split("#")[0];

    window.history.replaceState(null, null, newURL);
  }
  location.reload();
});

tryAgainButton.addEventListener("click", () => {
  localStorage.clear();
  const currentURL = window.location.href;

  if (currentURL.includes("#")) {
    const newURL = currentURL.split("#")[0];

    window.history.replaceState(null, null, newURL);
  }
  location.reload();
});

fetchQuestions();
