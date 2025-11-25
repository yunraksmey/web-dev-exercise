document.addEventListener("DOMContentLoaded",function (){
    const question = document.getElementById("question");
    const choices = document.getElementById("choices");
    const nextBtn = document.getElementById("nextBtn");
    const result = document.getElementById("result");

    function loadQuiz() {
        nextBtn.classList.add("hidden");
        choices.innerHTML = "";
        const currentData = quizData[currentQuiz];
        question.textContent = currentData.question;
        const choiceArr = currentData.choices
        choiceArr.forEach(choice => {
            const button = document.createElement("button");
            button.textContent = choice;
            button.addEventListener("click",selectAnswer);
            choices.appendChild(button);
        });
    }
    function selectAnswer(e){
        const selectAnswer = e.target.textContent;
        const correctAnswer = quizData[currentQuiz].answer;
        if(selectAnswer === correctAnswer){
            e.target.style.backgroundColor = "green";
            score++ ;
        }
        else{
            e.target.style.backgroundColor = "red";
        }
        Array.from(choices.children).forEach(btn => btn.disabled = true);
        nextBtn.classList.remove("hidden");
    }
    function showResult() {
    document.getElementById("quiz").classList.add("hidden");
    result.classList.remove("hidden");
    result.textContent = `ពិន្ទុរបស់អ្នកគឺ ${score} / ${quizData.length} !`
  }
    const quizData = [
        {
            question: "What is the keyword to declare a variable in JavaScript ?",
            choices: ["let","int","String","function"],
            answer: "let"
        },
        {
             question: "Do You know ? What is My Favorite Song ?",
            choices: ["Dung Chan","M'nus laor","Love Alone","First Love"],
            answer: "First Love"
        },
        {
             question: "What is the Css Property for changing text color ?",
            choices: ["background-color","color","text-align","font-size"],
            answer: "color"
        },
    ];
    let currentQuiz = 0;
    let score = 0;
    nextBtn.addEventListener("click",function (event){
        currentQuiz++;
        if (currentQuiz < quizData.length) {
        loadQuiz();
        } else {
      showResult();
    }
    });
    loadQuiz();
});