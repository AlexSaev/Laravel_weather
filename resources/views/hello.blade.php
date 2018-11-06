<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Document</title>
</head>
<body>
    <h1>Дарова, <?= $name; ?>!</h1>
    <h2>Сегодня расписание таково:</h2>
    <ul>
        @foreach($tasks as $task)
            <li>{{$task}}</li>
        @endforeach
    </ul>
    <h2>Сделал всё это?</h2>
    <h3>Если да, то ты великолепен!</h3>
</body>

</html>