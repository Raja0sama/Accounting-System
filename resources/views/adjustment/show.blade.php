@extends('layouts.app')

@section('header')
<title>Adjustments</title>

<link rel="stylesheet" type="text/css" href="https://printjs-4de6.kxcdn.com/print.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<style>
    form .form-control:disabled,
    form textarea[readonly],
    form .form-control[readonly] {
        background: white !important;
        color: black;
        margin-bottom: 12px;
    }
</style>

@endsection

@section('content')
<div class="col-lg-12">
    <div class="block">
        <div class="title"><strong>Print Adjustment Voucher</strong></div>
        <div class="block-body">
            <form name="form" id="showform" action="" method="post" class="form-horizontal">
                <div id="printJS-form">
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="col-md-4 control-label" for="selectbasic">No</label>
                                    <input id="selectbasic" name="selectbasic" class="form-control"
                                        value="{{ $adjustment->id }}" />
                                </div>
                                <div class="col-md-4">
                                    <label class="col-md-4 control-label" for="selectbasic"
                                        class="form-control">Date</label>
                                    <input type="date" id="datevalue" name="datevalue" class="form-control"
                                        value="{{ $adjustment->date->toDateString() }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line"> </div>
                    <br>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-md-12 control-label" for="selectbasic">Chart Of Account</label>
                                    <div class="show_product"></div>
                                    <input id="chartvalue" name="chartvalue" class="form-control"
                                        value="{{ \App\Chartaccount::find($adjustment->chartaccount)->accountname }}" />

                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Main Account</label>
                                    <input id="mainvalue" name="mainvalue" class="form-control"
                                        value="{{ \App\Account::find($adjustment->mainaccount)->name }}" />
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Sub Account</label>
                                    <input id="subvalue" name="subvalue" class="form-control"
                                        value="{{\App\Subaccount::find($adjustment->subaccount)->accountname}}" />

                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Debit</label>
                                    <input class="col-md-8 form-control" id="value" name="value" placeholder="Rs."
                                        type="number" value="{{ $adjustment->amount }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-9">
                            <div class="row">
                            </div>
                        </div>
                    </div>
                    <div class="line"> </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-md-12 control-label" for="selectbasic">Chart Of Account</label>
                                    <div class="show_product"></div>
                                    <input id="chartvalue1" name="chartvalue1" class="form-control"
                                        value="{{\App\Chartaccount::find($adjustment->chartaccount1)->accountname}}" />
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Main Account</label>
                                    <input id="mainvalue" name="mainvalue" class="form-control"
                                        value="{{ \App\Account::find($adjustment->mainaccount1)->name }}" />
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Sub Account</label>
                                    <input id="subvalue" name="subvalue" class="form-control"
                                        value="{{\App\Subaccount::find($adjustment->subaccount1)->accountname}}" />

                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Credit</label>
                                    <input class="col-md-8 form-control" id="value1" name="value1" placeholder="Rs."
                                        type="number" value="{{ $adjustment->amount1 }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-horizontal">
                        <div class="form-group row">
                            <label class="col-sm-1 form-control-label">Description</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" id="description"
                                    name="description">{{$adjustment->description}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<button type="button" class="btn btn-primary" style="position:absolute; height:41px ; width:101px ; bottom:70px; left:0px;"
    onclick="printJS ({ printable: 'printJS-form', type: 'html' , header: 'Adjustment Voucher' })">Print Form</button>
@endsection

@section('footer')
<script src="/core/js/jspdf.js"></script>
<script src="/core/js/jquery-2.1.3.js"></script>
<script src="/core/js/pdfFromHTML.js"></script>
<!-- these js files are used for making PDF -->
<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
<script>
    $( function(){
        $('form#showform input', ).prop('readonly',true);
        $('form#showform textarea', ).prop('readonly',true);
    });
</script>
@endsection
