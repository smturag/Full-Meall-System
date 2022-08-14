@extends('master')
@section('add_member')

<div class="Container">


    <script>
        $(document).ready(function(){
                $("date").datepicker();
            })
    </script>


    <h1>Add Member</h1>


    <div class="card" style="width: 18rem;">
        <div id="insertDiv">
            <button class="btn btn-primary" id="insert_button" data-toggle="collapse" type="button"
                data-target="#insertDate" ` aria-expanded="true" aria-controls="insertDate">
                Insert Date
            </button>
            <div class="collapse" id="insertDate">
                <div class="card card-body">
                    <form action="{{route('addYm')}}" method="post">
                        @csrf

                        <p><input type="date" id="date" name="date" @error("date") is-invalid @enderror required> </p>
                        <button type="submit" class="btn btn-dark">Dark</button>
                    </form>
                </div>
            </div>
        </div>

        <div>
            <div>

                @if($a= Session::get('date'))

                <script>
                    function hideDiv(){
                    $(document).ready(function(){
                    $('#insertDiv').hide();
                   
                })}
                hideDiv();                
                </script>
                {{$date = Session::get('date')}}
                {{-- <strong>{{ $a }}</strong> --}}
                <form action="{{route('addMember')}}" method="post">
                    @csrf
                    <div>
                        <div id='inputName'>

                        </div>
                        <input type="button" onClick="addInput()" value="+">
                    </div>
                    <p><input type="text" name="date" value={{$date}} readonly></p>
                    <input type="submit" id="submitMember" value="Dark" class="btn btn-dark">
                </form>

                @endif
                <div>
                    @if($b=Session::get('insert'))
                    <strong>{{$b}}</strong>
                    @endif

                </div>

            </div>
            <div>
                @if($b= Session::get('error'))
                <strong>{{ $b }}</strong>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
<script>

</script>