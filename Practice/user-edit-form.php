<?php
    $q = "SELECT user, name, password, type FROM users WHERE user = '" . $_SESSION['user'] . "'";

    $search = $dbase->query($q);
    $reg = $search->fetch_object();
?>

<h1>Edit User</h1>  
<form action="user-edit.php" method="post">
    <table>
        <tr>
            <td>User:</td>
            <td><input type="text" name="user" id="user" size="10" maxlength="10" value="<?php echo $reg->user ?>"></td>
        </tr>
        <tr>
            <td>Name:</td>
            <td><input type="text" name="name" id="name" size="30" maxlength="30"  value="<?php echo $reg->name ?>"></td>
        </tr> 
        <tr>
            <td>Type:</td>
            <td>
                <input type="text" name="type" id="type" readonly  value="<?php echo $reg->type ?>">
            </td>
        </tr> 
        <tr>
            <td>Password:</td>
            <td><input type="password" name="password1" id="password1" size="8" maxlength="8"></td>
        </tr>
        <tr>
            <td>Confirm Password:</td>
            <td><input type="password" name="password2" id="password2" size="8" maxlength="8"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Save"></td>
        </tr>
    </table>
</form>