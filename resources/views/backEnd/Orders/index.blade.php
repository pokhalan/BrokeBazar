@extends('backEnd.layouts.master')
@section('title','List Orders')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="/admin/Orders/index" class="current">Orders</a></div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Well done!</strong> {{Session::get('message')}}
            </div>
        @endif
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>List Orders</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>ZipCode</th>
                        <th>Mobile</th>
                        <th>Order Date</th>
                        <th>Order Status</th>
                        <th>Payment Method</th>
                        <th>Total</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($Orders as $order)

                        <tr class="gradeC">
                            <td style="vertical-align: middle;">{{$order->id}}</td>
                            <td style="vertical-align: middle;">{{$order->name}}</td>
                            <td style="vertical-align: middle;">{{$order->users_email}}</td>
                            <td style="vertical-align: middle;">{{$order->address}}</td>
                            <td style="vertical-align: middle;">{{$order->city}}</td>
                            <td style="vertical-align: middle;">{{$order->state}}</td>
                            <td style="vertical-align: middle;">{{$order->pincode}}</td>
                            <td style="vertical-align: middle;">{{$order->mobile}}</td>
                            <td style="vertical-align: middle;">{{$order->created_At}}</td>
                            <td style="vertical-align: middle;">{{$order->order_status}}</td>
                            <td style="vertical-align: middle;">{{$order->payment_method}}</td>
                            <td style="vertical-align: middle;">{{$order->grand_total}}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('jsblock')
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery.ui.custom.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.uniform.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/matrix.js')}}"></script>
    <script src="{{asset('js/matrix.tables.js')}}"></script>
    <script src="{{asset('js/matrix.popover.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
        $(".deleteRecord").click(function () {
            var id=$(this).attr('rel');
            var deleteFunction=$(this).attr('rel1');
            swal({
                title:'Are you sure?',
                text:"You won't be able to revert this!",
                type:'warning',
                showCancelButton:true,
                confirmButtonColor:'#3085d6',
                cancelButtonColor:'#d33',
                confirmButtonText:'Yes, delete it!',
                cancelButtonText:'No, cancel!',
                confirmButtonClass:'btn btn-success',
                cancelButtonClass:'btn btn-danger',
                buttonsStyling:false,
                reverseButtons:true
            },function () {
                window.location.href="/admin/"+deleteFunction+"/"+id;
            });
        });
    </script>
@endsection
