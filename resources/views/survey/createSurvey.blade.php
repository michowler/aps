@extends('layouts.owner_layout')

@section('navbar-brand', 'Create Survey')

@section('content')
<div class="container-fluid">

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Owner Profile</h4>
                </div>
                <div class="content">
                    <form action="{{url('store')}}" method="POST">

                        {{csrf_field()}}

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Survey Title</label>
                                    <input type="text" class="form-control" placeholder="Survey Title" name="surveys_title">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Survey Description</label>
                                    <textarea rows="6" class="form-control" placeholder="Here can be your description" value="Mike", name="surveys_description"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Interest</label><br>
                                    <label for="one" name="interest">
                                        <input type="checkbox" value="1"> Food</label><br>
                                        <label for="two">
                                            <input type="checkbox" value="2"> Travel</label><br>
                                            <label for="three">
                                                <input type="checkbox" value="3"> Music</label><br>
                                                <label for="four">
                                                    <input type="checkbox" value="4"> Shopping</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">

                                             <label>Location</label><br>
                                             <input type="text" class="form-control" placeholder="Location" name="location">
                <!--div class="form-group">
                    <label>Location</label><br>
                    <label for="one">
                        <input type="checkbox" id="one" /> Sunway Pyramid</label><br>
                        <label for="two">
                        <input type="checkbox" id="two" /> Pavilion</label><br>
                        <label for="three">
                        <input type="checkbox" id="three" /> MidValley</label><br>
                        <label for="four">
                        <input type="checkbox" id="four"/> IOI City Mall</label>
                    </div-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Voucher</label><br>
                        <!--form action="/insert"-->
                        
                        <select name="voucher">
                            <option value="1">Discount 30%</option>
                            <option value="2">Discount 10%</option>
                            <option value="3">Free Gift</option>
                            <option value="4">Free</option>
                            <option value="5">Buy 1 Free 1</option>
                            <option value="6">Buy 2 Free 1</option>
                        </select>

                    </div>
                </div>
            </div>






            <button type="submit" class="btn btn-info btn-fill pull-right">Next</button>
            <div class="clearfix"></div>

        </form>
    </div>
</div>
</div>      





</div>
</div>
</div>
</div>
@endsection

