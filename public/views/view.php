<?php
require_once "../../app/classes/VehicleManager.php";

$vehicleManager = new VehicleManager("", "", "", "");

$id = $_GET['id'] ?? null;

if ($id === null) {
    header("Location: ../index.php");
    exit;
}

$vehicles = $vehicleManager->getVehicles();
$vehicle = $vehicles[$id] ?? null;

if (!$vehicle) {
    header("Location: ../index.php");
    exit;
}

include './header.php';
?>


<div class="container my-4">
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Vehicle Details</h1>
        <a href="../index.php" class="btn btn-secondary">Vehicle List</a>
    </div>
    <hr class=" mb-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="<?= $vehicle['image'] ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3"><?= $vehicle['name'] ?></h5>
                    <p class="card-text mb-0"><b>Type: </b><?= $vehicle['type'] ?></p>
                    <p class="card-text mb-0"><b>Price: </b>$<?= $vehicle['price'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>