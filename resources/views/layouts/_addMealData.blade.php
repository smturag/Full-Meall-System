@extends('layouts._addMealSheet')
@section('add_data')


<div>
    <form action="{{route('addMM')}}" method="post">
        @csrf
        <input type="hidden" value="{{$date}}" name="dateVal">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    @foreach ($allMember as $member)
                    <th scope="col">{{$member->name}}</th>
                    @endforeach
                </tr>
            </thead>
            @foreach($dates as $date)
            <tbody>
                <tr>
                    <input type="hidden" value="{{$date}}" name="daily_date" id="">
                    <td scope='col'>{{$date}}</td>
                    @foreach ($allMember as $member)
                    <input type="hidden" name="memberName[]" value="{{$member->name}}" id="">
                    <td scope='col'> <input placeholder="total" type="number" name="mealCount[]" id=""></td>
                    @endforeach
                </tr>
            </tbody>
            @endforeach

        </table>
        <button type="submit">Submit</button>
    </form>



</div>


@endsection