<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <fieldset>
        <legend>Data posts</legend>
        <table border="1">
            <tr>
                <th>no</th>
                <th>Tittle</th>
                <th>content</th>
            </tr>
            @foreach ($post as  $data)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <th>{{ $data->tittle }}</th>
                <th>{{ Str::limit($data->content,100) }}</th>
            </tr>
            @endforeach
        </table>
    </fieldset>
</body>
</html>
