<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List</title>
    @vite(['resources/js/app.js'])
</head>

<body class="bg-slate-600">
    <div class="w-10/12 mt-28 mx-auto">
        <div class="max-w-md rounded overflow-hidden shadow-lg mx-auto bg-slate-50">
            <h2 class="text-2xl font-bold text-center mt-3">Todo List</h2>
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ $date }} 新增項目</div>
                <ul class="mb-2">
                    @foreach ($todolists['today_created'] as $todolist)
                        <li>{{ $todolist->content }}</li>
                    @endforeach
                </ul>
                <div class="font-bold text-xl mb-2">{{ $date }} 完成項目</div>
                <ul>
                    @foreach ($todolists['today_completed'] as $todolist)
                        <li>{{ $todolist->content }}</li>
                    @endforeach
                </ul>
                <div class="font-bold text-xl mb-2">剩餘項目</div>
                <ul>
                    @foreach ($todolists['remaining'] as $todolist)
                        <li>{{ $todolist->content }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</body>

</html>
