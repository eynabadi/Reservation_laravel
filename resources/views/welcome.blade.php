<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('search')}}" method="get">
    <select name="city">
        <option value="	آبسرد">	آبسرد</option>
        <option value="همدان">همدان</option>

    </select>

    <button type="submit">search</button>
</form>
<div>
@foreach($sr as $sr1)
    <h1>{{$sr1->name}}</h1>
    <h2>{{$sr1->city}}</h2>
    <h2>{{$sr1->date}}</h2>
    <a href="{{url('text',$sr1->id)}}" >create</a>
@endforeach
</div>
</body>
</html>

