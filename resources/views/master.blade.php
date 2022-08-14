@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                    <div>
                        <div class="Container">
                
                        </div>
                        <div class="d-flex flex-row">
                            <div class="sideBar">
                                @include('layouts._sidebar')
                            </div>
                            <div class="Container">
                                @yield('profile')
                                @yield('add_member')
                                @yield('_viewChart')
                                @yield('_addSheet')
                            </div>                
                        </div>               
                
                    </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

