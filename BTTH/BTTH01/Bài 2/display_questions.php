<?php
$filename = "questions.txt";
$questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);


$questionsData = [];
$current_question = [];

foreach ($questions as $line) {

    if (strpos($line, "Câu") === 0) {

        if (!empty($current_question)) {
            $questionsData[] = $current_question;
        }
       
        $current_question = [$line];
    } else {
        $current_question[] = $line;
    }
}

if (!empty($current_question)) {
    $questionsData[] = $current_question;
}

$questionNumber = 1;


foreach ($questionsData as $question) {
    echo "<div class='card mb-4'>";
    echo "<div class='card-header'><strong>{$question[0]}</strong></div>";
    echo "<div class='card-body'>";


    for ($i = 1; $i <= 4; $i++) {
        $answer = substr($question[$i], 0, 1); // A, B, C, D
        echo "<div class='form-check'>";
        echo "<input class='form-check-input' type='radio' name='question{$questionNumber}' value='{$answer}' id='question{$questionNumber}{$answer}'>";
        echo "<label class='form-check-label' for='question{$questionNumber}{$answer}'>{$question[$i]}</label>";
        echo "</div>";
    }

    echo "</div>"; // card-body
    echo "</div>"; // card
    $questionNumber++;
}
?>
