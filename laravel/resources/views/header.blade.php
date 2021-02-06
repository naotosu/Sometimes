@section('header')

      <div class="header">
        <div class="header-menus">
            <div class="icon">
              <a href="{{ url('/') }}">TOP</a>
            </div>
            <div class="icon">
              <a href="{{ url('/input') }}">お薬登録</a>
            </div>
        </div>
            
        <div class="header-right">
          @guest                            
          @else                        
            <div class="icon">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    {{ __('ログアウト') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>
          @endguest
        
          @if (Route::has('login'))
            
                @auth
                  <div class="icon">
                    <a href="{{ url('/home') }}">{{ Auth::user()->name }}様</a>
                  </div>
                @else
                  <div class="icon">
                    <a href="{{ route('login') }}">ログイン</a>
                  </div>

                    @if (Route::has('register'))
                  <div class="icon">
                    <a href="{{ route('register') }}">ユーザー登録</a>
                    @endif
                  </div>
                @endauth
            </div>
          @endif
        </div>
      </div>
 
 
@endsection



