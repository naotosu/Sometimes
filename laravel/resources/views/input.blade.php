@extends('common')

@section('content')
@include('header')
  <div class="top-page">
    <div class="top_title">
      <form action="{{url('/input_data')}}" method="POST">
        {{ csrf_field() }}
        <h1>お薬登録画面</h1>
        {{$today = \Carbon\Carbon::today()}}
        <h2>お薬の名前 <input type="text" name="medicine_name" value="薬の名前"></h2>
        <h2>頻度 
          <select name='sometime' input type="date">
            @for ($count=1; $count<=7; $count++)
              @if ($count==1)
                <option value='{{$count}}'>毎日</option>
              @elseif ($count<=6)
                <option value='{{$count}}'>{{$count}}日に一度</option>
              @else
                <option value='{{$count}}'>一週間に一度</option>
              @endif
            @endfor            
          </select></h2>
        <h2>飲む時間 <!-- TODO 0：00〜30分刻みで選択出来る様にしたい　-->
          <select name="time_to" input type="date">
            <option value='{{$today->addHours(6)}}'>6:00</option>
            <option value='{{$today->addHours(2)}}'>8:00</option>
            <option value='{{$today->addHours(4)}}'>12:00</option>
            <option value='{{$today->addHours(1)}}'>13:00</option>
            <option value='{{$today->addHours(5)}}'>18:00</option>
            <option value='{{$today->addHours(2)}}'>20:00</option>
          </h2>
        <h2><input type="submit" value="登録"></h2>
      </form>
    </div>
  </div>

@include('footer')
@endsection
