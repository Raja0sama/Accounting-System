@extends('layouts.app')

@section('header')
<title>Invoice</title>
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
        <div class="title"><strong>Invoice</strong></div>
        <div class="block-body">
            <form name="form" id="invoice" class="form-horizontal">
                <div id="printJS-form">
                    <div id="HTMLtoPDF">
                        <div class="form-group row" id='NoAndDate'>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label class="col-md-4 control-label" for="selectbasic">No</label>
                                        <input id="selectbasic" name="selectbasic" value="{{ $invoice->id }}" class="form-control"/>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-md-4 control-label" for="selectbasic"
                                            class="form-control">Date</label>
                                        <input type="date" id="datevalue" name="datevalue" class="form-control"
                                            value="{{ $invoice->Date}}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="line"> </div>
                        <div class="form-group row" id='InvoiceTopLine'>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label class="col-md-4 control-label" for="selectbasic">Bill</label>
                                        <input id="bill" name="bill" class="form-control" value="{{ $invoice->Bill}}"/>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="col-md-4 control-label" for="selectbasic">Customer</label>
                                        <input id="Customer" name="Customer" class="form-control" value="{{ $invoice->Customer }}">

                                    </div>

                                </div>
                            </div>
                        </div>
                        <br>
                        {{-- I am not using blade for because for some reason it messes with auto-formating  --}}
                        <?php for($i = 1; $i <= 6; $i++) { ?>
                        <div class="form-group row" id='line{{$i}}'>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-md-5">
                                        @if ($i==1)
                                        <label class="col-md-4 control-label" for="selectbasic">Sub Account</label>
                                        @endif
                                        <input id="subvalue{{$i}}" name="subvalue{{$i}}"
                                            value="{{ $invoice['subaccount' . $i] }}" class="form-control"/>
                                    </div>
                                    <div class="col-md-4">
                                        @if ($i==1)
                                        <label class="col-md-4 control-label" for="selectbasic">Amount</label>
                                        @endif
                                        <input class="form-control" id="value{{$i}}" name="value{{$i}}"
                                            value="{{ $invoice['subaccountvalue' . $i]  ? $invoice['subaccountvalue' . $i] : '' }}" type="number" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($i<6)
                        <div class="line" style='margin-bottom:22px'>
                        </div>
                        @endif
                        <?php } ?>
                        <hr>
                        <div class="form-group row" id='totals'>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="col-md-8 control-label" for="selectbasic">Total</label>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-md-8 control-label" for="selectbasic">Rs. {{ $invoice->Total }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="form-horizontal" id='through'>
                        <div class="form-group row">
                            <label class="col-sm-1 form-control-label">Description</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" id="description"
                                    maxlength=255 name="description">{{ $invoice->Description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<button type="button" class="btn btn-primary" style="height:41px ; width:101px ;margin-left: -28px; margin-top: 33px;"
    onclick="printJS ({ printable: 'printJS-form', type: 'html' , header: 'Payment Voucher' })">Print Form</button>
@endsection

@section('footer')
<script src="{{ asset('js/app.js') }}" defer></script>

<script src="/core/js/jspdf.js"></script>
<script src="/core/js/jquery-2.1.3.js"></script>
<script src="/core/js/pdfFromHTML.js"></script>

<script>
    function cancel(){
        location.reload();
    }

    function showAll(){
        location.href="{{ route("invoices.index") }}"
    }

    function applyOldValues(old){
        for (const field in old) {
            if (old.hasOwnProperty(field)) {
                const value = old[field];
                element=$($('form#invoice input[name=' + field +']')[0] || $('form#invoice select[name=' + field +']')[0]) ;
                if (element.attr('name') && (element.attr('type')!='hidden')) {
                    element.val(value);
                    if (element.attr('vueAttribute')){
                        VueApp[element.attr('vueAttribute')]=value;
                    } else {
                        if (element.attr('onChange')) {
                            eval(element.attr('onChange'));
                        } else {
                            element.trigger('input');
                        }
                    }
                }
                delete old[field];
                setTimeout(function() { applyOldValues(old) },100);
                return null
            }
        }
    }

    $( function () {
        old= {!! json_encode(old()) !!}
        applyOldValues(old);
    })

</script>
<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
<script>
    $( function(){
        $('form#invoice input', ).prop('readonly',true);
        $('form#invoice textarea', ).prop('readonly',true);
    });
</script>
@endsection
