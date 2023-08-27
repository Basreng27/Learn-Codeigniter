<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registasi</title>
</head>

<body>
    <form action="<?php echo base_url() ?>prosesregis" method="POST">
        <table>
            <tr>
                <td>user</td>
                <td>:</td>
                <td><input type="text" name="user"></td>
            </tr>
            <tr>
                <td>password</td>
                <td>:</td>
                <td><input type="text" name="pass"></td>
            </tr>
            <tr>
                <td>level</td>
                <td>:</td>
                <td><select name="lvl">
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select></td>
            </tr>
            <tr>
                <td><button type="submit">Submit</button></td>
            </tr>
        </table>
    </form>
</body>

</html>