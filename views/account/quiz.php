<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Account';
$this->params['breadcrumbs'][] = $this->title ;
$this->params['breadcrumbs'][] = Yii::$app->user->identity->fio ;
?>


<div class="site-about text-center">
    <h3><?= Html::encode($quiz_title) ?></h3>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<div class="quiz-container ">
  <div id="quiz"></div>
</div>
<button id="next">Следующий</button>
<button id="submit">Смотреть результат</button>
<h3><span id="results"></span></h3>


</div>
<?php $quiz_json = $quiz_data;  ?>

<script>

(function() {


  const myQuestions = <?php echo $quiz_json; ?>;

  function buildQuiz() {
    const output = [];

    myQuestions.forEach((currentQuestion, questionNumber) => {
      const answers = [];

      for (letter in currentQuestion.answers) {
        answers.push(
          `<label>
             <input type="radio" name="question${questionNumber}" value="${letter}">
              ${letter} :
              ${currentQuestion.answers[letter]}
           </label>`
        );
      }


      output.push(
        `<div class="slide">
           <div class="question"> ${currentQuestion.question} </div>
           <div class="answers"> ${answers.join("")} </div>
         </div>`
      );
    });

    quizContainer.innerHTML = output.join("");
  }

  function showResults() {
    const answerContainers = quizContainer.querySelectorAll(".answers");

    let numCorrect = 0;

    myQuestions.forEach((currentQuestion, questionNumber) => {
      const answerContainer = answerContainers[questionNumber];
      const selector = `input[name=question${questionNumber}]:checked`;
      const userAnswer = (answerContainer.querySelector(selector) || {}).value;

      if (userAnswer === currentQuestion.correctAnswer) {
        numCorrect++;


      }


    });
      document.querySelector('#submit').style.display ='none';
      document.querySelector('.quiz-container').remove();


    result_answr = `${numCorrect} из ${myQuestions.length}`;
    request(result_answr);

    resultsContainer.innerHTML = `Ваш результат:<br><h1>${numCorrect} верных ответов из ${myQuestions.length}</h1>`;

  }

  function showSlide(n) {
    slides[currentSlide].classList.remove("active-slide");
    slides[n].classList.add("active-slide");
    currentSlide = n;


    if (currentSlide === slides.length - 1) {
      nextButton.style.display = "none";
      submitButton.style.display = "inline-block";
    } else {
      nextButton.style.display = "inline-block";
      submitButton.style.display = "none";
    }
  }

  function showNextSlide() {
    showSlide(currentSlide + 1);
  }


  const quizContainer = document.getElementById("quiz");
  const resultsContainer = document.getElementById("results");
  const submitButton = document.getElementById("submit");

  buildQuiz();

  const nextButton = document.getElementById("next");
  const slides = document.querySelectorAll(".slide");
  let currentSlide = 0;

  showSlide(0);


  submitButton.addEventListener("click", showResults);
  nextButton.addEventListener("click", showNextSlide);
})();

function request(result_answr){
    $.ajax({
    url: '<?php echo Yii::$app->request->baseUrl. '/account/test' ?>',
    type: 'post',
    data: {
             result: result_answr ,
             id_quiz: <?=$id_quiz ?> ,
             id_user: <?=$id_user?> ,
             _csrf : '<?=Yii::$app->request->getCsrfToken()?>'
          },
    success: function (data) {
          console.log(data);
    }
    });

}

</script>
