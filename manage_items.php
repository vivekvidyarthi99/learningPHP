<?php
include 'session.php';
include 'header.php';
include 'config.php';

$id = $_GET['id'];



$conn = new mysqli($host,$username,$password,$dbname);
$sql = "SELECT * FROM mytable WHERE id = $id";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

?>
<?php
    if (isset($_POST['Submit']))
    {

    $id = $_GET['id'];

    $item_title = strtoupper(htmlspecialchars($_POST['item_title']));
    $item_type = strtoupper(htmlspecialchars($_POST['item_type']));
    $item_lot = strtoupper(htmlspecialchars($_POST['item_lot']));
    $row['item_type'] = strtoupper($item_type);
    $row['item_title'] = strtoupper($item_title);
    $row['item_lot'] = strtoupper($item_lot);
    mysqli_query($conn,
    "UPDATE mytable SET item_type='$item_type', item_title='$item_title', item_lot='$item_lot' Where id = '$id'");
    echo "Item with ID:", $id, " changed successfully";


    };
?>
<p>Edit Records</p>

<form action="" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
    <div>
        <p><strong>ID:</strong><?php echo $id; ?></p>

        <strong>Item Title: </strong> <input type="text" name="item_title" value="<?php echo $row['item_title']; ?>"/><br/>

        <strong>Item Type: </strong> <input type="text" name="item_type" value="<?php echo $row['item_type']; ?>"/><br/>
        <strong>Item Lot Number: </strong> <input type="text" name="item_lot" value="<?php echo $row['item_lot']; ?>"/><br/>
        <input type="submit" name="Submit" value="Submit">


    </div>
</form>

<p><a href="database_view.php">View Items</a> </p>
<p><a href="index.php">Home</a> </p>

<?php
include 'footer.php';
?>

<?php
include 'config.php';
?>