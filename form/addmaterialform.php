<!DOCTYPE html>
<html lang ="en">

<head>
    <title>	HTML template</title>
    <meta name="viewport" content="width=device-width, initial-scale = 1.0" charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body>

<form name ="addmaterialsform" method="POST" action ="../add_material.php">

    <!--
    $barcode = isset($_POST['barcode'])?$_POST['barcode']:"";
        $name = isset($_POST['length'])?$_POST['length']:"";
        $color = isset($_POST['color'])?$_POST['color']:"";
        $price_pkg = isset($_POST['price_pkg'])?$_POST['price_pkg']:"";
        $yarn_count = isset($_POST['yarn_count'])?$_POST['yarn_count']:"";
        $strength = isset($_POST['strength'])?$_POST['strength']:"";
        $absorbency = isset($_POST['absorbency'])?$_POST['absorbency']:"";
    -->
    <label>BarCode:</label><input name="barcode" type="number"></br>
    <label>Name:</label><input name="name" type="text"></br>
    <label>Price Per kg:</label><input name="price_pkg" type="number"></br>
    <label>Color:</label><input name="color" type="text"></br>
    <label>Yarn Count:</label><input name="yarn_count" type="number"></br><label>g/m</label>
    <label>Strength:</label><input name="strength" type="number"><label>N/m^2</label></br>
    <label>Absorbency:</label><input name="absorbency" type="number"></br>

    <input name="addmaterials" type="submit" value="Add Material">

</form>

<script type="text/javascript" src ="https://code.jquery.com/jquery.js"></script>
<script type="text/javascript" src ="js/bootstrap.min.js"></script>

</body>
</html>