<!DOCTYPE html>
<!-- AUTHOR: Junhui Xie
    CREATED: 2015-04-05
    UPDATED: 2015-04-10 -->

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Junhui Xie">
        <meta name="description" content="Assignment 3">
        <title>Car Rental Invoice</title>
    </head>
    <body>
        <?php
        $name = $_POST["name"];
        $carType = $_POST["carType"];
        $day = $_POST["dayNum"];
        if (!isset($_POST["options"])) {
            $carOption = array();
        } else {
            $carOption = $_POST["options"];
        }
        $optionNum = count($carOption);

        if ($carType === "Compact") {
            $typeCost = 25 * $day;
        } else if ($carType === "Intermediate") {
            $typeCost = 35 * $day;
        } else if ($carType === "Luxury") {
            $typeCost = 75 * $day;
        }
        $sum = isset($_POST['sum']) ? $_POST['sum'] : '';
        ?>
        <h1 style="text-align: center; color: royalblue">
            Thank you <?php echo $name; ?> for using Tried and True Car Rental!
        </h1>
        <table>
            <tr>
                <td style="font-size: 20px; font-family: Arial;"><b>Here is your invoice:</b></td>
            </tr>
            <tr>
                <td style="font-family: Arial;"><?php echo $day; ?> <?php echo $carType; ?> 
                    rental - $<?php echo number_format($typeCost, 2); ?></td>
            </tr>
            <tr>
                <td style="font-size: 20px; font-family: Arial;"><b>Options:</b></td>
            </tr>
            <tr>
                <td style="font-family: Arial;">
                    <?php
                    for($i = 0; $i < $optionNum; $i++) {
                        if ($carOption[$i] === "GPS") {
                            $optionCost = number_format(14.30 * $day, 2);
                            echo $carOption[$i] . " - " . " $" . $optionCost . "<br/>";
                        } else if ($carOption[$i] === "Child Safety Seat") {
                            $optionCost = number_format(12.50 * $day, 2);
                            echo $carOption[$i] . " - " . " $" . $optionCost . "<br/>";
                        } else if ($carOption[$i] === "Insurance") {
                            $optionCost = number_format(8.05 * $day, 2);
                            echo $carOption[$i] . " - " . " $" . $optionCost;
                        }
                        $sum = $sum + $optionCost;
                        $rentalCost = number_format($typeCost, 2) + $sum;
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="color: orangered; font-family: Arial; font-size: 19px;"><b>Rental Cost: 
                    $<?php echo $rentalCost; ?></b></td>
            </tr>
            <tr>
                <td style="color: orangered; font-family: Arial; font-size: 19px;"><b>13% Tax: 
                    $<?php echo number_format($rentalCost * 0.13, 2); ?></b></td>
            </tr>
            <tr>
                <td style="color: orangered; font-family: Arial; font-size: 19px;"><b>Total Cost: 
                    $<?php echo (number_format($rentalCost * 0.13, 2)) + $rentalCost; ?></b></td>
            </tr>
        </table>
    </body>
</html>
