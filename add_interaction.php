<?php
require 'templates/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_POST['customer_id'];
    $interaction_date = $_POST['interaction_date'];
    $notes = $_POST['notes'];

    $conn = new mysqli("localhost", "root", "", "crm_db");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO interactions (customer_id, interaction_date, notes) VALUES ('$customer_id', '$interaction_date', '$notes')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>New interaction added successfully</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<div class="container mt-5">
    <h1 class="text-center">Add New Interaction</h1>
    <form method="POST" action="add_interaction.php">
        <div class="mb-3">
            <label for="customer_id" class="form-label">Customer</label>
            <select class="form-control" id="customer_id" name="customer_id" required>
                <?php
                $conn = new mysqli("localhost", "root", "", "crm_db");

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT id, name FROM customers";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['name']}</option>";
                    }
                }

                $conn->close();
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="interaction_date" class="form-label">Interaction Date</label>
            <input type="date" class="form-control" id="interaction_date" name="interaction_date" required>
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">Notes</label>
            <textarea class="form-control" id="notes" name="notes" required></textarea>
        </div>
        <button
