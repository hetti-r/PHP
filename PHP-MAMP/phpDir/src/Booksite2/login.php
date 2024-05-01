<?php
/**
 * This script handles user management operations such as creating, deleting,
 * and updating user information in a database. It uses prepared statements
 * to securely process user input.
 */

// Start or resume a session
session_start();

// Include the database connection file
require_once 'db.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// If username and password are set, create a new user
    if (isset($_POST["title"]) && isset($_POST["author"]) && isset($_POST["publishing_year"]) && isset($_POST["genre"]) && isset($_POST["description"])) {
// Prepare an INSERT statement to add a new user to the 'users' table
        $stmt = $conn->prepare("INSERT INTO books (title, author, publishing_year, genre, description) VALUES (?, ?, ?, ?, ?)");
// Bind the username and password parameters to the prepared statement
        $stmt->bind_param("ssiss", $_POST["title"], $_POST["author"], $_POST['publishing_year'], $_POST['genre'], $_POST['description']);
// Execute the prepared statement
        $stmt->execute();
// Close the prepared statement
        $stmt->close();
    }

// If delete_id is set, delete the specified user
    if (isset($_POST["delete_id"])) {
// Prepare a DELETE statement to remove a user from the 'users' table
        $stmt = $conn->prepare("DELETE FROM books WHERE id = ?");
// Bind the delete_id parameter to the prepared statement
        $stmt->bind_param("i", $_POST["delete_id"]);
// Execute the prepared statement
        $stmt->execute();
// Close the prepared statement
        $stmt->close();
    }

// If edit_id is set, update the specified user's information
    if (isset($_POST["edit_id"])) {
// Prepare an UPDATE statement to modify a user's information in the 'users' table
        $stmt = $conn->prepare("UPDATE books SET title = ?, author = ?, publishing_year = ?, genre = ?, description = ? WHERE id = ?");
// Bind the edit_username, edit_password, and edit_id parameters to the prepared statement
        $stmt->bind_param("ssissi", $_POST["edit_title"], $_POST["edit_author"], $_POST['edit_publishing_year'], $_POST['edit_genre'], $_POST['edit_description'], $_POST["edit_id"]);
// Execute the prepared statement
        $stmt->execute();
// Close the prepared statement
        $stmt->close();
    }

// Redirect to the same page to prevent form resubmission on page refresh
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit;
}

// Retrieve all users from the 'users' table
$result = $conn->query("SELECT * FROM books");

// Initialize an array to hold the user data
$rows = array();
// Fetch each row of user data and add it to the $rows array
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}
