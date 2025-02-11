<h1>New User</h1>  
<form action="user-new.php" method="post">
    <table>
        <tr>
            <td>User:</td>
            <td><input type="text" name="user" id="user" size="10" maxlength="10"></td>
        </tr>
        <tr>
            <td>Name:</td>
            <td><input type="text" name="name" id="name" size="30" maxlength="30"></td>
        </tr> 
        <tr>
            <td>Type:</td>
            <td>
                <select name="type" id="type">
                    <option value="admin">System Administrator</option>
                    <option value="editor">Autorized Editor</option>
                </select>
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
            <td><input type="submit" value="Register"></td>
        </tr>
    </table>
</form>