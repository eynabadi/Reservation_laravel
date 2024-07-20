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
<div>

    @foreach($r as $r1)

  @if(!$r1->members->contains(auth()->user()))
            <div>

                <h1>{{$r1->name}}</h1>
                <p>{{$r1->date}}</p>
                <img width="100px" src="/image/{{$r1->image}}" alt="dddd">
                <a href="{{route('postsadd',$r1->id)}}">add</a>

        </div>
        @else
      <div>  ثبت نام شده ای</div>
        @endif
    @endforeach
</div>

</body>
</html>
