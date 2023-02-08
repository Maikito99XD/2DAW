<h2>CONTACT US</h2>

<form action="<?=$_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <td><label for="FirstName">First Name*</label>
            <input type="text" name="FirstName" required /></td>
            <td><label for="LastName">Last Name</label>
            <input type="text" name="LastName" /></td>
        </tr>
    </table><br>
    <label for="descripcion">Email*</label>
    <input type="text" name="email" required/><br>
    <label for="mensaje">Subject*</label>
    <input type="text" name="subject" required /><br>
    <label for="mensaje">Message*</label>
    <textarea name="mensaje" rows="10" cols="50" required></textarea><br><br>
    <input type="submit" value="ENVIAR">
    <p><?=$mensaje;?></p>
</form>
