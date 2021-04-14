<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
 
    <table>
        <tr><th>名前</th><th>声優</th><th>説明</th></tr>
        @foreach ($items as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->CV}}</td>
                <td>{{$item->description}}</td>
            </tr>
        @endforeach
    </table>
 
</body>
</html>