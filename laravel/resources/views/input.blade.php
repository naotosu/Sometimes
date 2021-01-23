@extends('common')

@section('content')
@include('header')
  <div class="top-page">
    <div class="top_title">
      <form action="{{url('/inputs')}}" method="POST">
        <h1>お薬登録画面</h1>
        <h2>お薬の名前 <input type="text" name="medicine_name"></h2>
        <h2>頻度 
          <select name='sometime'>
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
        <h2>飲む時間 <input type="text" name="time_to"></h2>
        
      </form>
    </div>
  </div>

@include('footer')
@endsection
