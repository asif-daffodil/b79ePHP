<?php
$conn = mysqli_connect("localhost", "root", "", "b79e");

$teachers = $conn->query("SELECT * FROM `teachers`");
while ($teacher = $teachers->fetch_object()) {
    echo "Teacher Name : " . $teacher->name . "<br>Gender : " . $teacher->gender . "<br><br>";
}

// echo $teachers->num_rows;



if (isset($_POST['at'])) {
    $tname = $_POST['tname'];
    $gender = $_POST['gender'];
    $insert = $conn->query("INSERT INTO `teachers` (`name`, `gender`) VALUES ('$tname', '$gender') ");
    if (!$insert) {
        echo "Something wnet wrong";
    } else {
        echo "Data inserted successfully";
    }
}

?>

<form action="" method="post">
    <input type="text" placeholder="Teacher Name" name="tname" required>
    <br><br>
    Gender :
    <input type="radio" value="Male" name="gender" required>Male
    <input type="radio" value="Female" name="gender" required>Female
    <br><br>
    <button type="submit" name="at">Add Teacher</button>
</form>