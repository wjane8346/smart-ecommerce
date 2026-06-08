<?php
// Connect to student_db
$conn = mysqli_connect("localhost", "root", "", "student_db");

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Fetch Students - Smart E-Commerce</title>
    <style>
        body { font-family: Arial; background: #F5F5F5; margin: 50px; }
        .container { background: white; padding: 30px; border-radius: 10px; max-width: 800px; margin: auto; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #2C3E66; color: white; }
        h2 { color: #2C3E66; }
    </style>
</head>
<body>
<div class="container">
    <h2>Student Records</h2>
    
    <?php
    // Fetch all records from students table
    $result = mysqli_query($conn, "SELECT * FROM students");
    
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Full Name</th><th>Email</th><th>Course</th><th>Admission No</th><th>Year</th></tr>";
        
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['full_name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['course'] . "</td>";
            echo "<td>" . $row['admission_number'] . "</td>";
            echo "<td>" . $row['year_of_study'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No students found.</p>";
    }
    
    mysqli_close($conn);
    ?>
</div>
</body>
</html>