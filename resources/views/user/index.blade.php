<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>사용자 정보</title>
</head>
<body>
    @if($user)
        <h1>안녕하세요,{{ $user->name }}님</h1>
        <p>이메일:{{ $user->email }}</p>
    @else
        <h1>사용자를 찾을 수 없습니다.</h1>
    @endif
</body>
</html>