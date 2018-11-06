<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Document</title>
</head>
<body>
<ul>
    @foreach($tasks as $task)
        <li>{{$task->body}}</li>
    @endforeach
</ul>
</body>
</html>