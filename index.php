<?php
/*
Create a simple Class called Vehicles. This Class should have the properties: name, model, makeYear, color, fuelType. Use a constructor. Create a method which will return the name and the model of this vehicle. 

Instantiate 3 new objects from this Class. 

Once you have done creating these objects, create a new Class called Ships. This Class will extend the Vehicles Class. Add new properties and methods to this Class.

Instantiate 3 new objects from this Class. 
*/

class Vehicle {
  public string $picture;
  public string $name;
  private string $model; // will be accessible outside only via the function showNameModel();
  public int $makeYear;
  public string $color;
  public string $fuelType;

  function __construct($picture, $name, $model, $makeYear, $color, $fuelType)
  {
    $this->picture = $picture;
    $this->name = $name;
    $this->model = $model;
    $this->makeYear = $makeYear;
    $this->color = $color;
    $this->fuelType = $fuelType;
  }

  public function showNameModel() {
    return "My vehicle is a " . $this->name . " and the model is: " . $this->model . ".<br><br>";
  }
}

$myBike = new Vehicle("cube.jpg", "Cube", "Road Race", 2022, "blue", "legs");
$myCar = new Vehicle("car.jpg", "Hyundai", "Santa Fe", 2015, "silver", "petrol");
$myMotorcycle = new Vehicle("motor.jpg", "Soco", "TC", 2020, "green", "electric");

// echo $myVehicle->color;
echo "<div class='container mt-5'>";
echo "<h2>My Vehicles</h2>";

echo $myBike->showNameModel() . $myCar->showNameModel() . $myMotorcycle->showNameModel() . "<br>";
echo "</div>";

class Ship extends Vehicle {
  public int $length;
  private int $crew_count;

	public function __construct($picture, $name, $model, $makeYear, $color, $fuelType, $length, $crew_count)
	{
    parent::__construct($picture, $name, $model, $makeYear, $color, $fuelType);
		$this->length = $length;
		$this->crew_count = $crew_count;
	}

  public function showNMCrew() {
    return $this->showNameModel() . "It needs " . $this->crew_count . " crew member(s). <br><br>";
  }
}

$myShip = new Ship("yacht.jpg", "Yamaha", "Yacht", 2017, "white", "petrol", 20, 6);
$myCanoe = new Ship("canoe.jpg", "Canoe", "Original", 1985, "brown", "arms", 5, 1);
$myCruiseShip = new Ship("cruise.jpg", "Fincantieri", "BigAssShip", 2019, "white", "HFO", 300, 1000);

echo "<div class='container'>";
echo "<h2>My Ships</h2>";
echo $myShip->showNMCrew() . $myCanoe->showNMCrew() . $myCruiseShip->showNMCrew() . "<br>";
echo "</div>";

$vehicles = [$myBike, $myCar, $myMotorcycle, $myShip, $myCanoe, $myCruiseShip];

// echo "<pre>";
// echo var_dump($vehicles);
// echo "</pre>";

echo "<h3 class='text-center my-5'>Loop thru the array and output name, model etc...</h3>";

$card = "";
foreach($vehicles as $value) {
  if($value->length) {
  // echo "$value->name<br>";
  $card .= "

      <div class='d-flex justify-content-center'>
        <div class='card p-0 g-0 mb-5 shadow' style='width: 18rem; border:none;'>
          <img src='images/" . $value->picture . "' class='card-img-top'>
          <div class='card-body'>
            <h5 class='card-title'>" . $value->name . "</h5>
            <p class='card-text text-muted'>Fuel Type: " . $value->fuelType . "</p>
          </div>
          <ul class='list-group list-group-flush'>
            <li class='list-group-item'>Make Year: " . $value->makeYear . "</li>
            <li class='list-group-item'>Length of the ship: ". $value->length  ." m</li>
            <li class='list-group-item'>" . $value->showNMCrew(). "</li>
          </ul>
        </div>
      </div>
  ";
  } else {
    $card .= "

    <div class='d-flex justify-content-center'>
      <div class='card p-0 g-0 mb-5 shadow' style='width: 18rem; border:none;'>
        <img src='images/" . $value->picture . "' class='card-img-top'>
        <div class='card-body'>
          <h5 class='card-title'>" . $value->name . "</h5>
          <p class='card-text text-muted'>" . $value->showNameModel() . "</p>
        </div>
        <ul class='list-group list-group-flush'>
          <li class='list-group-item'>Fuel Type: " . $value->fuelType . "</li>
          <li class='list-group-item'>Make Year: " . $value->makeYear . "</li>
        </ul>
      </div>
    </div>
";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>php OOP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <style>
    img {
      aspect-ratio: 3/2;
    }
  </style>
</head>
<body>
  <div class='w-75 my-2 mx-auto'>
    <div class='row row-cols-1 row-cols-md-2 row-cols-xl-3'>
      <?= $card ?>
    </div>
  </div>  
</body>
</html>