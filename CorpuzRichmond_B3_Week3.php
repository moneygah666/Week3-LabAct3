<?php

// Base class for common vehicle information
class Vehicle {
    // Protected properties to be accessible within the class and its subclasses
    protected $manufacturer;
    protected $modelName;
    protected $productionYear;

    // Constructor to initialize the properties
    public function __construct($manufacturer, $modelName, $productionYear) {
        $this->manufacturer = $manufacturer;
        $this->modelName = $modelName;
        $this->productionYear = $productionYear;
    }

    // Final method to display vehicle information. Final means it cannot be overridden by subclasses.
    final public function getDetails() {
        return "Manufacturer: $this->manufacturer, Model: $this->modelName, Year: $this->productionYear";
    }

    // Method to be overridden by derived classes to describe the vehicle
    public function describe() {
        return "This is a vehicle.";
    }
}

// Class extending Vehicle for cars
class Car extends Vehicle {
    // Private property specific to cars
    private $doorCount;

    // Constructor to initialize properties including those from the base class
    public function __construct($manufacturer, $modelName, $productionYear, $doorCount) {
        parent::__construct($manufacturer, $modelName, $productionYear); // Call parent constructor
        $this->doorCount = $doorCount;
    }

    // Overridden method to describe the car
    public function describe() {
        return "This is a car.";
    }

    // Getter for door count
    public function getDoorCount() {
        return $this->doorCount;
    }
}

// Interface for electric vehicles
interface ElectricVehicle {
    // Method to charge the battery
    public function chargeBattery();
}

// Class extending Car and implementing ElectricVehicle
class ElectricCar extends Car implements ElectricVehicle {
    // Implement the chargeBattery method from the ElectricVehicle interface
    public function chargeBattery() {
        return "Battery is charging...";
    }

    // Overridden method to describe the electric car
    public function describe() {
        return "This is an electric car.";
    }
}

// Final class for motorcycles (cannot be extended further)
final class Motorcycle extends Vehicle {
    // Overridden method to describe the motorcycle
    public function describe() {
        return "This is a motorcycle.";
    }
}

// Example usage
$genericVehicle = new Vehicle("Acme Motors", "EcoDrive", 2026);
echo $genericVehicle->getDetails(); // Output: Manufacturer: Acme Motors, Model: EcoDrive, Year: 2026
echo "<br>";
echo $genericVehicle->describe();   // Output: This is a vehicle.
echo "<br>";

$sedan = new Car("Chevrolet", "Camaro", 2021, 2);
echo $sedan->getDetails();          // Output: Manufacturer: Chevrolet, Model: Camaro, Year: 2021
echo "<br>";
echo $sedan->describe();            // Output: This is a car.
echo "<br>";

$ev = new ElectricCar("BMW", "i4", 2023, 4);
echo $ev->getDetails();            // Output: Manufacturer: BMW, Model: i4, Year: 2023
echo "<br>";
echo $ev->describe();              // Output: This is an electric car.
echo "<br>";
echo $ev->chargeBattery();         // Output: Battery is charging...
echo "<br>";

$sportBike = new Motorcycle("Kawasaki", "Ninja ZX-6R", 2024);
echo $sportBike->getDetails();     // Output: Manufacturer: Kawasaki, Model: Ninja ZX-6R, Year: 2024
echo "<br>";
echo $sportBike->describe();       // Output: This is a motorcycle.
echo "<br>";

?>