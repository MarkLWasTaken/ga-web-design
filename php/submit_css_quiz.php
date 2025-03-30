
<!-- 
Start of the lines/blocks of codes
Developed by M4
Student ID: Redacted
 -->

<?php 

$conn= mysqli_connect("localhost","root","","ucdf2307_rwdd_group_4") or die("Unable to connect");


$user_answers = [
    'q1' => $_POST['q1'] ?? null,
    'q2' => $_POST['q2'] ?? null,
    'q3' => $_POST['q3'] ?? null,
    'q4' => $_POST['q4'] ?? null,
    'q5' => $_POST['q5'] ?? null,
    'q6' => $_POST['q6'] ?? null,
];

$correct_answers = [
    'q1' => 'C',
    'q2' => 'D',
    'q3' => 'C',
    'q4' => 'B',
    'q5' => 'C',
    'q6' => 'A',
];

$results = [];
foreach ($correct_answers as $question => $correct_answer) {
    $results[$question] = ($user_answers[$question] == $correct_answer) ? 'True' : 'False';
}

$users_id = 1;
$sql = "INSERT INTO css_quiz_answers (users_id, q1_answer, q2_answer, q3_answer, q4_answer, q5_answer, q6_answer) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("issssss", $users_id, $results['q1'], $results['q2'], $results['q3'], $results['q4'], $results['q5'], $results['q6']);
if ($stmt->execute()) {
    echo "success";
} else {
    echo "error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

<!-- 
End of the lines/blocks of codes
Developed by M4
Student ID: Redacted
 -->
