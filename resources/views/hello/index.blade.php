<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bladeテンプレート</title>
</head>
<body>
    <h1>Blade/index</h1>
    @if ($msg != '')
    <p>こんにちは！{{$msg}}さん</p>
    @else
    <p>何か書いてください。</p>
    @endif
    <form method="POST" action="/hello">
        @csrf
        <input type="text" name="msg">
        <input type="submit">
    </form>
</body>
</html>