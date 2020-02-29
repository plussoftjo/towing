@extends('voyager::master')

@section('page_title', __('Admin-Panel Driver Request'))

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="admin-section-title">
                    <h3><i class="voyager-list"></i>Driver Request</h3>
                </div>
                <div class="clear"></div>
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>name</th>
                                        <th>phone</th>
                                        <th>state</th>
                                        <th>check</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <th>{{$user->id}}</th>
                                            <th>{{$user->name}}</th>
                                            <th>{{$user->phone}}</th>
                                            <th style="color:red;font-weight:700;">Waiting</th>
                                            <th><a class="btn btn-success btn-sm" href="{{route('check_request',$user->id)}}">check</a></th>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            @if (count($users) == 0)
                                <h3 style="text-align:center;">There are no request for now</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div><!-- .row -->
        </div><!-- .col-md-12 -->
    </div><!-- .page-content container-fluid -->
@stop

@section('javascript')
<script>
    new Vue({
        el: '#user_request',
        data() {
            return {
                count:0
            }
        },
        methods:{
            incress:function() {
                let vm = this;
                vm.count += 1;
            }
        }
    });
</script>
@endsection
