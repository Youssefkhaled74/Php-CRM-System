<?php require 'templates/header.php'; ?>

<div class="container mt-5">
    <h1 class="text-center">CRM Dashboard</h1>
    <div class="row">
        <div class="col-md-6">
            <h2>Customers</h2>
            <a href="view_customers.php" class="btn btn-primary">View All Customers</a>
        </div>
        <div class="col-md-6">
            <h2>Recent Interactions</h2>
            <a href="view_interactions.php" class="btn btn-primary">View All Interactions</a>
        </div>
    </div>
</div>

<?php require 'templates/footer.php'; ?>
