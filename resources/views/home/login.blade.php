<div id="formasas">
    <form name=login action="{{ url('/login') }}" class='login' method=POST>
        {{ csrf_field() }}
        <table class="title" width="100%" border="0"><tr><td valign=center width="50%">Log in Sistem <td><img src="images/kas_oprasional.jpg" width="60px" height="50px"></table>
        <input type="text" placeholder="email" name="email" value="{{ old('email') }}" autofocus/>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      
        <i class="fa fa-user"></i>
        <input type="password" placeholder="Password" name="password" />
        
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      
        <i class="fa fa-key"></i>
        <a href="#">Lupa Password ?</a>
        <br>
        <button>
            <i class="spinner"></i>
            <span class="state">Log in</span>
        </button>
    </form>
    <h1 align=center>APLIKASI PENJUALAN</h1>
           
</div>