@extends('master')
@section('_addSheet')
<div>
      <div>
            <form action="{{route('getMemberByMonth')}}" method="get">
                  <div>
                        <select name="getMonth" class="custom-select" required>
                              <option value="">Select Month</option>
                              <option value="01">January</option>
                              <option value="02">February</option>
                              <option value="03">March</option>
                              <option value="04">April</option>
                              <option value="05">May</option>
                              <option value="06">June</option>
                              <option value="07">July</option>
                              <option value="08">August</option>
                              <option value="09">Septemper</option>
                              <option value="10">October</option>
                              <option value="11">November</option>
                              <option value="12">December</option>
                        </select>
                  </div>
                  <div>
                        <select name="getYear" class="custom-select" required>
                              <option value="">Select Year</option>
                              <option value="2021">2021</option>
                              <option value="2022">2022</option>
                              <option value="2023">2023</option>
                              <option value="2024">2024</option>
                              <option value="2025">2025</option>
                              <option value="2026">2026</option>
                              <option value="2027">2027</option>
                              <option value="2028">2028</option>
                              <option value="2029">2029</option>
                              <option value="2030">2030</option>
                        </select>
                  </div>
                  <button href="{{route('getMemberByMonth')}}"> Submit </button>
            </form>
      </div>

      <div>

            <div>
                  @if (Session::has('error'))
                      {{Session::get('error')}}
                  @else
                  @yield('add_data')
                  @endif
                 
            </div>
      </div>

</div>
@endsection