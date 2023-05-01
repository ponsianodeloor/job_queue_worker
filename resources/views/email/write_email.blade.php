<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enviar Email</title>
</head>
<body>
<form action="{{route('email.send')}}" method="post">
    @csrf
    <table>
        <tr>
            <td>Email</td>
            <td> <input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td>Asunto</td>
            <td><input type="text" name="asunto" id="asunto"></td>
        </tr>
        <tr>
            <td>Mensaje</td>
            <td><input type="text" name="mensaje" id="mensaje"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Enviar Email">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
