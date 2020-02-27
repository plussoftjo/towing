@extends('voyager::master')

@section('page_title', __('hello'))

@section('content')
    <div class="page-content container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div id="faked">
                    @{{count}}
                </div>
            </div><!-- .row -->
        </div><!-- .col-md-12 -->
    </div><!-- .page-content container-fluid -->
@stop

@section('javascript')
<script>
    import view from './test/view.vue'
    new Vue({
        el: '#faked',
        data() {
            return {
                count:0
            }
        },
        components:{view}
    });
</script>
@endsection
