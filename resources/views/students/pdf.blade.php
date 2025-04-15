<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanulók listája</title>
</head>
<body>
    <h1>Tanulók listája</h1>
    <table>
        <thead>
            <tr>
                <th>Neve</th>
                <th>Osztály</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->schoolclasses->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
