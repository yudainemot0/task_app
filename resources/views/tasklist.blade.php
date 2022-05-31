<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/2808fc0fc2.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>TODAY'S TASK</title>
    
</head>
<body>
    <main class="text-center text-gray-500">

        <div class="w-screen h-screen flex justify-center items-center flex-col gap-5">

            <div>
                <h1 class="text-6xl font-sans font-semibold">TODAY'S TASK</h1>
            </div>

            <div class="text-lg">
                <!-- バリデーション -->
                @if (count($tasks) > 0)
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
                @endif
            
                <form method="post">
                    @csrf
                    <!-- タスク入力欄 -->
                    
                        <input type="text" name="content" placeholder="Task input" class="border border-gray-200 hover:border-indigo-400 rounded-sm pl-1">
                        <button formaction="{{route('task.add')}}" class="text-indigo-500"><i class="fas fa-chevron-circle-down"></i></button>
                    
                    <!-- タスク一覧 -->
                        <ul class="">
                            @foreach ($tasks as $task)
                            <li class="my-6 flex justify-between gap-5">
                                <span class="">{{$task->content}}</span>
                                <!-- <span>{{$task->id}}</span> -->
                                <button formaction="{{route('task.destroy', ['id'=>$task->id])}}" class="text-red-400"><i class="fas fa-trash-alt"></i></button>
                            </li>
                            @endforeach
                        </ul>
                </form>
            </div>
            
        </div>
    </main>
</body>
</html>