<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <meta name="" content="">
</head>
<body>
<form action="/comments" method="POST">
    Имя:
    <input type="text" name="name"/><br/>
    Комментарий:<br/>
    <textarea name="text"></textarea>
    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <br/>
    <input type="submit" value="Добавить"/>

</form>
</body>
</html>