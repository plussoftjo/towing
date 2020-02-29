@extends('voyager::master')

@section('page_title', __('Admin-Panel Orders'))

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="admin-section-title">
                    <h3><i class="voyager-list"></i>Orders</h3>
                </div>
                <div class="clear"></div>
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>UserID</th>
                                        <th>DriverID</th>
                                        <th>state</th>
                                        <th>Service</th>
                                        <th>Fare</th>
                                        <th>Created at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <th>{{$order->id}}</th>
                                            <th>{{$order->user_id}}</th>
                                            <th>{{$order->driver_id}}</th>
                                            <th>
                                                @if ($order->state == 4)
                                                    Complete order
                                                @else
                                                    In Process
                                                @endif
                                            </th>
                                            <th>{{$order->order_info->service}}</th>
                                            <th>{{$order->order_info->amount}}$</th>
                                            <th>{{$order->created_at}}</th>
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
