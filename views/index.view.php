<div class="container-fluid">
    <div class="row">
        <div class="col-8 offset-2">
            <h3 class="display-4">Search cars</h3>
            <form action="carInfo.php" method="get">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="<?php if (isset($_GET['error'])) {
                                                                                            echo "No match found. Try again!";
                                                                                        } else {
                                                                                            echo "Search";
                                                                                        } ?>">
                    <div class="input-group-append">
                        <button type="submit" name="subBtn" class="btn btn-info">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-8 offset-2">
            <div class="row">
                <?php foreach ($db as $car) : ?>
                    <div class="col-3">
                        <a href="carInfo.php?id=<?php echo $car['id']; ?>">
                            <div class="card text-center">

                                <div class="card-header">
                                    <?php echo $car["brend"]; ?>
                                </div>

                                <div class="card-body">
                                    <?php echo $car['name']; ?>
                                </div>


                                <div class="card-footer">
                                    <button class="btn btn-primary btn-sm"> <?php echo $car['price'] . " $"; ?></button>
                                    <button class="btn btn-<?php if ($car['used']) {
                                                                echo 'warning';
                                                            } else {
                                                                echo "success";
                                                            } ?> btn-sm">
                                        <?php if ($car['used']) {
                                            echo "Used";
                                        } else {
                                            echo "New";
                                        } ?>
                                    </button>
                                </div>
                            </div>
                        </a>

                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>