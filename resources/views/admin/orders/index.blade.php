@extends ('admin.layouts.master')

@section('content')
 <!-- Breadcrumbs-->
 <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Orders</li>
    </ol>
<div>
  <div class="card mb-3 ml-3 mr-3">
          <div class="card-header">
            <div class="row">
              <span>Orders</span>
              <form class="form-inline offset-md-8 offset-sm-5" action="">
                <div class="form-group ">
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="Search" placeholder="Search">
                  <button class="btn btn-outline-secondary" type="button">Button</button>
                </div>
              </form>
              
            </div>
          </div>
          
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Shipping</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Total</th>
                  </tr>
                </thead>
                
                <tbody>
                  @foreach($orders as $order)
                    <tr>
                      <td>
                        {{$order['id']}}
                      </td>
                      <td>{{$order['customer']['name']}}</td>
                      <td>{{ ($order['shipping']['deliverAddress']) ."," ($order['shipping']['deliverDistrict']) ."," ($order['shipping']['deliverCity']) }}</td>
                      <td>
                        @if ($order['payment']['method']==1) 
                          COD 
                        @else
                          @if ($order['payment']['method']==2)
                            Credit card 
                          @else
                            ATM 
                          @endif
                        @endif
                        
                        </td>
                      <td>
                        @switch ($order['status'])
                          @case(1) Đơn hàng mới
                            @break
                          @case(2)	Đơn hàng đang được xử lý
                            @break@
                          case(3) Đơn hàng đã được xác nhận
                            @break@
                          case(4) Đơn hàng đang được giao
                            @break 
                          case(5) Đơn hàng đã thành công
                            @break 
                          case(6) Đơn hàng đã bị hủy
                            @break 
                          case(7) Đơn hàng giao thất bại
                            @break 
                        @endswitch
                       
                        </td>
                      <td>{{$order['totalAmount']}}</td>
                      
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
        </div>
@endsection