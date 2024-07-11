<?php
// ratePatent.php

// Assuming you have established database connection
// and sanitized input for security
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Method Not Allowed']);
    exit;
}

// Validate and sanitize input (example)
if (!isset($_POST['patentId']) || !isset($_POST['rating'])) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Missing parameters']);
    exit;
}

$patentId = $_POST['patentId'];
$rating = $_POST['rating'];

// Update the database
$query = "UPDATE patents SET patent_Rating = :rating WHERE id = :patentId";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':rating', $rating, PDO::PARAM_INT);
$stmt->bindParam(':patentId', $patentId, PDO::PARAM_INT);

try {
    $stmt->execute();
    // Return success response
    http_response_code(200);
    header('Content-Type: application/json');
    echo json_encode(['message' => 'Rating updated successfully']);
} catch (PDOException $e) {
    // Handle database errors
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
