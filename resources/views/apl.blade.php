@extends('layouts.app')

@section('content')

    @if (Auth::guest())
        @include('home.apl')
    @else
        @include('adm.apl')
    @endif
    
    <div id="footer">
        <table align=right>
            <tr>
                <td><font size=2 color=white> Software Developer : &copy; {{date('Y')}} Heru Pranata &nbsp;
            </table>
        </div>
    </div>
@endsection
