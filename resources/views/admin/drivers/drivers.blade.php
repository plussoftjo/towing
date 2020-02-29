@extends('voyager::master')

@section('page_title', __('Admin-Panel Drivers'))

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="admin-section-title">
                    <h3><i class="voyager-list"></i>Drivers</h3>
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
                                        <th>created at</th>
                                        <th>check</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <th>{{$user->id}}</th>
                                            <th>{{$user->name}}</th>
                                            <th>{{$user->phone}}</th>
                                            <th>{{$user->created_at}}</th>
                                            <th><a class="btn btn-success btn-sm" href="{{route('driver_check',$user->id)}}">check</a></th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
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
