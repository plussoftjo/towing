@extends('voyager::master')

@section('page_title', __('Admin-panel Rider'))

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row" id="check_request">
            <div class="col-md-12">
                <div class="admin-section-title">
                    <h3><i class="voyager-list"></i>Rider</h3>
                </div>
                <div class="clear"></div>
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="text-center">
                            <img src="/{{$user->avatar}}" width="100" height="100" style="border-radius: 50px;" class="rounded">
                          </div>
                        <div class="card" style="width: 100%;">
                            <div class="card-body">
                              <h5 class="card-title">User Details</h5>
                              <ul class="list-group">
                                <li class="list-group-item">ID: {{$user->id}}</li>
                                <li class="list-group-item">name: {{$user->name}}</li>
                                <li class="list-group-item">phone: {{$user->phone}}</li>
                                <li class="list-group-item">created at: {{$user->created_at}}</li>
                              </ul>
                            </div>
                        </div>
                        <div class="card" style="width: 100%;">
                            <div class="card-body">
                              <h5 class="card-title">Address Details</h5>
                              <ul class="list-group">
                                <li class="list-group-item">country: {{$user->user_profile->country}}</li>
                                <li class="list-group-item">state: {{$user->user_profile->state}}</li>
                                <li class="list-group-item">city: {{$user->user_profile->city}}</li>
                                <li class="list-group-item">address: {{$user->user_profile->address}}</li>
                                <li class="list-group-item">zip code: {{$user->user_profile->zip}}</li>
                              </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .row -->
        </div><!-- .col-md-12 -->
    </div><!-- .page-content container-fluid -->
@stop

@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js" integrity="sha256-T/f7Sju1ZfNNfBh7skWn0idlCBcI3RwdLSS4/I7NQKQ=" crossorigin="anonymous"></script>
<script>
    new Vue({
        el: '#check_request',
        data() {
            return {
            }
        },
        methods:{
            approve:function (id) {
                axios.get('/adminroutes/driver_request/approve/' + id).then(response => {
                    alert('User Approved success');
                    window.location.href = "/adminroutes/driver_request"
                }).catch(err => {
                    alert('Network error')
                });
            },
            reject:function (id) {
                axios.get('/adminroutes/driver_request/reject/' + id).then(response => {
                    alert('User reject success');
                    window.location.href = "/adminroutes/driver_request"
                }).catch(err => {
                    alert('Network error')
                });
            }
        }
    });
</script>
@endsection
