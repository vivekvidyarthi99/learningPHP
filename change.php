<?php

/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */
include "session.php";

if (isset($_POST['submit']))
{

    require "config.php";
    require "common.php";

    try
    {
        $connection = new PDO($dsn, $username, $password, $options);

        $new_user = array(
            "item_type" => $_POST['item_type'],
            "item_title"  => $_POST['item_title'],
            "item_lot"     => $_POST['item_lot'],

        );

        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            "mytable",
            implode(", ", array_keys($new_user)),
            ":" . implode(", :", array_keys($new_user))
        );

        $statement = $connection->prepare($sql);
        $statement->execute($new_user);
    }

    catch(PDOException $error)
    {
        echo $sql . "<br>" . $error->getMessage();
    }

}
?>

<?php require "header.php"; ?>

<?php
if (isset($_POST['submit']) && $statement)
{ ?>
    <blockquote><?php echo $_POST['item_title']; ?> successfully added.</blockquote>
    <?php
} ?>
<h2>Change Page</h2>

<form method="post">
    <label for="item_type">Stone Type</label>
    <input type="text" name="item_type" id="item_type">
    <label for="item_title">Stone Title</label>
    <input type="text" name="item_title" id="item_title">
    <label for="item_lot">Stone Lot</label>
    <input type="text" name="item_lot" id="item_lot">
    <input type="submit" name="submit" id="Submit">
</form>

<a href="index.php">Back to Home</a>

<?php include "footer.php" ?>
