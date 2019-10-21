<form method="post">
    <table>
<!--        <tr>-->
<!--            <td>id</td>-->
<!--            <td><input type="text" name="id" value="--><?php //echo $customer->id?><!--"></td>-->
<!--        </tr>-->
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="<?php echo $customer->name?>" ></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo $customer->email?>"></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name="address" value="<?php echo $customer->address?>"></td>
            <td><input type="submit" value="update"></td>
        </tr>

    </table>
</form>