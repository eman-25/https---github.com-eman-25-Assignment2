<?php
// Define the API URL
$api_url = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";

// Fetch the API response as a JSON string
$response = file_get_contents($api_url);

// Decode the JSON response into a PHP associative array
$data = json_decode($response, true);

// Check if data is valid and contains the 'results' key
if(!$data || !isset($data["results"])) 
{
    die("Error fetching the data from the API"); // Stop execution and display an error if data is invalid
}

// Extract the 'results' array from the decoded data
$result = $data['results'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Enrollment Data-ASSIGNMENT2</title>
    <!-- Link to Pico CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    
</head>
<body>

        <h1>Student Enrollment Data (Bachelor Programs)</h1>

            <div>
                <table>
                    <thead>
                        <tr>
                            <th>Year</th>
                            <th>Semester</th>
                            <th>Programs</th>
                            <th>Nationality</th>
                            <th>Colleges</th>
                            <th>Number of Students</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
               // Loop through each record in the results array
               foreach($result as $student) 
               {
                ?>
                <tr>
                    <!-- Display each data point in a table row -->
                    <td><?php echo $student["year"]; ?></td> <!-- Year -->
                    <td><?php echo $student["semester"]; ?></td> <!-- Semester -->
                    <td><?php echo $student["the_programs"]; ?></td> <!-- The Programs -->
                    <td><?php echo $student["nationality"]; ?></td> <!-- Nationality -->
                    <td><?php echo $student["colleges"]; ?></td> <!-- Colleges -->
                    <td><?php echo $student["number_of_students"]; ?></td> <!-- Number of Students -->
                </tr>
                <?php
               }
               ?>
                    </tbody>
                </table>
            </div>
</body>
</html>
