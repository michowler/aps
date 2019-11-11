@extends('layouts.owner_layout')

@section('navbar-brand', 'Check Out')

<div id="checkoutSuccess" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="material-icons">&#xE876;</i>
                </div>              
                <h4 class="modal-title">Awesome!</h4>   
            </div>
            <div class="modal-body">
                <p class="text-center">Your subscription has been confirmed.</p>
            </div>
            <div class="modal-footer">
                <a href="/ownerDashboard" class="btn btn-success btn-block">OK</a>
            </div>
        </div>
    </div>
</div>  


@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10">
                        <div class="card" style="z-index: -999;">
                            <div class="row">
                                 <div class="col-md-8">
                                    <div class="header">
                                        <h4 class="title">Billing Details</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <form id="createForm" method="post" action="{{url('storePayment')}}">
                                {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" name="first_name" class="form-control" placeholder="" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="last_name" class="form-control" placeholder="" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" name="billing_address" class="form-control" placeholder="" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" name="city" class="form-control" placeholder="" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" name="country"
                                                class="form-control" placeholder="" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="number" name="postal_code" class="form-control" min="00000" max="99999" placeholder="00000">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                                
                <div class="row">
                    <div class="col-md-8">
                            <div class="header">
                                <h4 class="title">Payment Method</h4>
                            </div>
                    </div>
                </div>
                            <div class="content">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Name on card</label>
                                                <input type="text" name="name_on_card" class="form-control" placeholder="" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Credit card number</label>
                                                <input type="text" name="card_num" class="form-control" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}" required placeholder="0000-0000-0000-0000" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="date">Expiry Date</label>
                                                <input type="month" name="card_expiry" class="form-control" placeholder="MM/YY" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Security Code</label>
                                                <input type="password" name="sec_code" class="form-control" minlength="3" maxlength="3" placeholder="xxx" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <button id="" href="#checkoutSuccess" name="Confirm" class="btn btn-info btn-fill pull-right" >Confirm</button>
                                    <!-- <a href="#checkoutSuccess" class="btn btn-info btn-fill pull-right" data-toggle="modal">Confirm</a> -->
                                    <div class="clearfix"></div>

                            </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script>
        $("#createForm").submit(function(e){
            e.preventDefault();
            $.ajax({
                url: '/storePayment',
                type: 'post',
                data: $("#createForm").serialize(),
                success:function(){
                    // $("#createForm").modal('hide');
                    $("#checkoutSuccess").modal('show');
                }
            })
        })
        </script>



@endsection