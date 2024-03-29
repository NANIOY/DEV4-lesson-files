<?php
include_once(__DIR__ . DIRECTORY_SEPARATOR . 'Vehicle.php');
class Bike extends Vehicle
{
    private int $battery;

    /**
     * Get the value of battery
     */
    public function getBattery(): int
    {
        return $this->battery;
    }

    /**
     * Set the value of battery
     */
    public function setBattery(int $battery): self
    {
        $this->battery = $battery;

        return $this;
    }

    public function book()
    {
        $result = parent::book();
        $result .= " Battery:" . $this->battery;
        return $result;
    }

    public function __toString()
    {
        $result = parent::__toString();
        $result .= " Battery:" . $this->battery;
        $result .= "Brand:" . $this->brand;
        return $result;
    }

    public function cancel()
    {
        $conn = new PDO('mysql:host=localhost;dbname=rental', 'root', '');
    }

    public static function getAll()
    {
        $conn = Db::getInstance();
        $statment = $conn->prepare("SELECT * FROM bookings WHERE type = 'bike'");
        $statment->execute();
        $result = $statment->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
