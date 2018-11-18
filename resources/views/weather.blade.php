<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <meta name="" content="">
</head>
<body>
<div class="container">
    @foreach($weathers as $weather)
        {{$weather->city}}
        @endforeach
</div>
</body>
</html>
