@extends('layouts.app')

@section('header')
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
        <div class="title"><strong>Print Payment Voucher</strong></div>
        <div class="block-body">
            <form name="form" id="showform" action="" method="post" class="form-horizontal">
                <div id="printJS-form">
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="col-md-4 control-label" for="selectbasic">No</label>
                                    <input class="form-control" value="{{ $payment->id }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="col-md-4 control-label" for="selectbasic"
                                        class="form-control">Date</label>
                                    <input type="text" id="chartvalue" name="chartvalue" class="form-control"
                                        value="{{ $payment->Date }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line"> </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">ChartAccount</label>
                                    <div class="show_product"></div>
                                    <input type="text" id="chartvalue" name="chartvalue" class="form-control"
                                        value="{{ $payment->chartaccount }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">MainAccount</label>
                                    <input type="text" id="chartvalue" name="chartvalue" class="form-control"
                                        value="{{ $payment->mainaccount }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">SubAccount</label>
                                    <input type="text" id="chartvalue" name="chartvalue" class="form-control"
                                        value="{{ $payment->subaccount1 }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Amount</label>
                                    <input class="col-md-8 form-control" id="value1" name="value1"
                                        value="{{ $payment->subaccountvalue1 }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php for($i = 2; $i <= 6; $i++) { ?>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3">
                                    <input type="text" id="subaccount{{$i}}" name="subaccount{{$i}}"
                                        class="form-control" value="{{ $payment['subaccount' . $i] }}">
                                </div>
                                <div class="col-md-3">
                                    <input class="col-md-8 form-control" id="subaccountvalue{{$i}}"
                                        name="subaccountvalue{{$i}}" value="{{ $payment['subaccountvalue' . $i] }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Total</label>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Rs. {{ $payment->Total }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="col-md-9 control-label" for="selectbasic">Through</label>

                                    <input type="text" id="chartvalue" name="chartvalue" class="form-control"
                                        value="{{ $payment->by}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <label class="col-sm-1 form-control-label">Description</label>
                    <textarea class="col-sm-5 form-control" id="description"
                        name="description">{{ $payment->Description }}</textarea>

                </div>
            </form>
        </div>
    </div>
</div>
<button type="button" class="btn btn-primary" style="height:41px ; width:101px ;margin-left: -16px; margin-top: 33px;"
    onclick="printJS ({ printable: 'printJS-form', type: 'html' , header: 'Payment Voucher' })">Print Form</button>
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
