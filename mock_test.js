function check(){

	var question1 = document.quiz.question1.value;
	var question2 = document.quiz.question2.value;
	var question3 = document.quiz.question3.value;
  var question4 = document.quiz.question4.value;
  var question5 = document.quiz.question5.value;
	var correct = 0;


	if (question1 == "Goole") {
		correct++;
}
	if (question2 == "Proud") {
		correct++;
}
	if (question3 == "Gerald Croft") {
		correct++;
	}
  if (question4 == "Shiela Birling") {
		correct++;
	}
  if (question5 == "Jolly") {
		correct++;
	}

	var messages = ["Well Done you got all of the questions correct so remember to use what has been learned in your own exams and follow your own interpretation of a character motives based on the actions they have made.", "You got a few of the questions right go back and have another look over the texts to make sure that you get a little more understanding on them", "You need to go back over the texts in order to get a better understanding of the books you are reading dont forget its important to memorise these characters"];
	var score;

	if (correct == 0) {
		score = 2;
	}

	if (correct > 0 && correct < 5) {
		score = 1;
	}

	if (correct == 5) {
		score = 0;
	}

	document.getElementById("after_submit").style.visibility = "visible";

	document.getElementById("message").innerHTML = messages[score];
	document.getElementById("number_correct").innerHTML = "You got " + correct + " correct.";
	}
