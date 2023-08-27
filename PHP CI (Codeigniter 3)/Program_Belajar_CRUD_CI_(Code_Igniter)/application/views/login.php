<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="<?php echo base_url() ?>proseslogin" method="POST">
        <table>
            <tr>
                <td>username</td>
                <td>:</td>
                <td><input type="text" name="user"><?php form_error('user', '<small class="text-danger pl-3">', '</small>'); ?></td>
            </tr>
            <tr>
                <td>password</td>
                <td>:</td>
                <td><input type="password" name="pass"><?php form_error('password', '<small class="text-danger pl-3">', '</small>'); ?></td>
            </tr>
            <tr>
                <td>
                    <button type="submit">Login</button>
                </td>
            </tr>
        </table>

        <a href="<?php echo base_url() ?>regis">Registasi</a>
    </form>
</body>

</html>