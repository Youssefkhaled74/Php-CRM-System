<?php require 'templates/header.php'; ?>

<div class="container mt-5">
    <h1 class="text-center">All Customers</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conn = new mysqli("localhost", "root", "", "crm_db");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM customers";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['created_at']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='4' class='text-center'>No customers found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<?php require 'templates/footer.php'; ?>
