<?php require 'templates/header.php'; ?>

<div class="container mt-5">
    <h1 class="text-center">All Interactions</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Customer</th>
                <th>Interaction Date</th>
                <th>Notes</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conn = new mysqli("localhost", "root", "", "crm_db");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT interactions.*, customers.name as customer_name FROM interactions 
                    JOIN customers ON interactions.customer_id = customers.id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['customer_name']}</td>
                        <td>{$row['interaction_date']}</td>
                        <td>{$row['notes']}</td>
                        <td>{$row['created_at']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='4' class='text-center'>No interactions found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<?php require 'templates/footer.php'; ?>
