 <?php
    require "db.php";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $cars = array_filter($db, function ($el) {
            global $id;
            return $el['id'] == $id;
        });

        //   var_dump($cars);
        // array(1) { [0]=> array(6) { ["id"]=> int(1) ["brend"]=> string(4) "audi" ["name"]=> string(2) "a3" ["price"]=> int(9000) ["used"]=> bool(true) ["info"]=> string(249) "Audi A3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem odio praesentium natus consequatur earum saepe officiis explicabo? Itaque, velit odio eveniet, similique veritatis aspernatur vitae cum necessitatibus mollitia eius accusantium." } }

    } else if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $cars = array_filter($db, function ($el) {
            global $search;
            return $el['brend'] == $search || $el['name'] == $search || $el['price'] == $search;
        });
        // Ako nema elementa unutar cars array
        if (count($cars) == 0) {
            header("Location: index.php?error=1");
        }
    }

    ?>

 <?php require "partials/top.php" ?>
 <?php require "partials/navbar.php"; ?>

 <div class="jumbotron text-center">
     <h2>
         <?php foreach ($cars as $car) : ?>
             <span> <?php echo $car['brend']; ?></span>
         <?php endforeach; ?>
     </h2>
 </div>
 <div class="container-fluid">
     <div class="row">
         <div class="col-8 offset-2">
             <div class="row">
                 <?php foreach ($cars as $car) : ?>
                     <div class="col-6" style="outline:1px solid #ddd">
                         <h3 class="display=4"> <?php echo $car['name']; ?></h3>
                         <hr>
                         <p> <?php echo $car['info']; ?></p>
                     </div>
                 <?php endforeach; ?>
             </div>
         </div>
     </div>
 </div>


 <?php require "partials/bootom.php"; ?>