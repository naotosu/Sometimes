@extends('common')

@section('content')
@include('header')
  <div class="top-page">
    @if (session('flash_message'))
      <div class="flash_message">
          {{ session('flash_message') }}
      </div>
    @endif
    <div class="top_title">
      <form action="{{url('/input_data')}}" method="POST">
        {{ csrf_field() }}
        <h2>お薬登録画面</h2>        
        @if ( $my_id == null )
          <h2>ユーザー登録し、ログインして下さい</h2>
        @else
          <div class="input_data">
            {{$today = \Carbon\Carbon::today()}}
          </div>
          <h3>お薬の名前 <input type="text" name="medicine_name" value="薬の名前"></h3>
          <h3>頻度 
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
            </select></h3>
          <h3>飲む時間 <!-- TODO 0：00〜30分刻みで選択出来る様にしたい　-->
            <select name="time_to" input type="date">
              <option value='{{$today->addHours(6)}}'>6:00</option>
              <option value='{{$today->addHours(1)}}'>7:00</option>
              <option value='{{$today->addHours(1)}}'>8:00</option>
              <option value='{{$today->addHours(3)}}'>11:00</option>
              <option value='{{$today->addHours(1)}}'>12:00</option>
              <option value='{{$today->addHours(1)}}'>13:00</option>
              <option value='{{$today->addHours(4)}}'>17:00</option>
              <option value='{{$today->addHours(1)}}'>18:00</option>
              <option value='{{$today->addHours(1)}}'>19:00</option>
              <option value='{{$today->addHours(1)}}'>20:00</option>
            </h3>
          <h2><input type="submit" value="登録"></h2>
        </form>
        <table border="1" align="center">
          <tr>
            <th>ユーザーID</th>
            <th>お薬の名前</th>
            <th>次に飲む時間</th>
            <th>飲む頻度</th>
            <th>消去</th>
          </tr>
          @foreach ($sometimes as $sometime)
          <tr>
            <td>{{$sometime->user_id}}</td>
            <td>{{$sometime->medicine_name}}</td>
            <td>{{$sometime->next_time}}</td>
            <td>
              @if ($sometime->interval_time == 1)
                {{'毎日'}}
              @elseif ($sometime->interval_time == 7)
                {{'一週間に一度'}}
              @else
                {{$sometime->interval_time}}日に一度</td>
              @endif
            <td>
              <div class="input_data">
                  <form action="{{url('/delete')}}" method="POST" class="input_data">
                  {{ csrf_field() }}
                  <input type="text" name="id" value="{{ $sometime->id }}" readonly>
              </div>
                  <input type="submit" value="消去">
              </form>
              </td>
          </tr>
          @endforeach
        </table>
    @endif
    </div>
  </div>
@include('footer')
@endsection
