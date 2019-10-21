<a href="index.php?page=add">add</a>
<table border="1">
    <tr>
        <td>stt</td>
        <td>name</td>
        <td>email</td>
        <td>address
        <td></td>
    </tr>
    <?php foreach ($customers as $key =>$customer):?>
    <tr>
        <td><?php echo ++$key?></td>
        <td><?php echo $customer->name?></td>
        <td><?php echo $customer->email?></td>
        <td><?php echo $customer->address?></td>
        <td><a href="index.php?page=delete&id=<?php echo $customer->id?>" onclick="return confirm('????')">delete</a></td>
        <td><a href="index.php?page=edit&id=<?php echo $customer->id?>" onclick="return confirm('????')">edit</a></td>
    </tr>
    <?php endforeach;?>
</table>