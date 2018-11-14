<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <meta name="" content="">
</head>
<body>
<form action="/weather" method="POST">
    Lon:
    <input type="text" name="lon"/><br/>
    Lat:
    <input type="text" name="lat"/><br/>
    {{--<textarea name="text"></textarea>--}}

    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <br/>
    <input type="submit" value="Добавить"/>
    {{--<a href="weather.blade.php"> </a>--}}

</form>
</body>
</html>