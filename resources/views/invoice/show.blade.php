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
            <link rel="stylesheet"  media="print" href="/core/css/printcss.css" >

                <div id="printJS-form">
                    <div class="col-12" id="HTMLtoPDF ">
                        <div class="col-sm-12">

                        <div class="form-group" id='NoAndDate'>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label class="col-sm-4 control-label" for="selectbasic">No</label>
                                        <input id="selectbasic" name="selectbasic" value="{{ $invoice->id }}" class="form-control"/>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label" for="selectbasic"
                                            class="form-control">Date</label>
                                        <input type="date" id="datevalue" name="datevalue" class="form-control"
                                            value="{{ $invoice->Date}}"/>
                                    </div>
                            </div>
                        </div>
                        <div class="line"> </div>
                        <div class="form-group " id='InvoiceTopLine'>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label class="col-sm-4 control-label" for="selectbasic">Bill</label>
                                        <input id="bill" name="bill" class="form-control" value="{{ $invoice->Bill}}"/>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label" for="selectbasic">Customer</label>
                                        <input id="Customer" name="Customer" class="form-control" value="{{ $invoice->Customer }}">

                                    </div>

                            </div>
                        </div>
                        <br>
                        {{-- I am not using blade for because for some reason it messes with auto-formating  --}}

                        <div class="form-group" id='line1'>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label class="col-sm-4 control-label" for="selectbasic">Sub Account</label>
                                        <input id="subvalue1" name="subvalue1"
                                            value="{{ $invoice->subaccount1n }}" class="form-control"/>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label" for="selectbasic">Amount</label>
                                        <input class="form-control" id="value1" name="value1"
                                            value="{{ $invoice->subaccountvalue1  ? $invoice->subaccountvalue1 : '' }}" type="number" />
                                    </div>
                            </div>
                        </div>
                    
<div class="form-group" id='line2'>
                                <div class="row">
                                    <div class="col-sm-5">
                                        
                                        <input id="subvalue2" name="subvalue2"
                                            value="{{ $invoice->subaccount2n }}" class="form-control"/>
                                    </div>
                                    <div class="col-sm-4">
                                        
                                        <input class="form-control" id="value2" name="value2"
                                            value="{{ $invoice->subaccountvalue2  ? $invoice->subaccountvalue2 : '' }}" type="number" />
                                    </div>
                            </div>
                        </div>
                    
<div class="form-group" id='line3'>
                                <div class="row">
                                    <div class="col-sm-5">
                                        
                                        <input id="subvalue3" name="subvalue3"
                                            value="{{ $invoice->subaccount3n }}" class="form-control"/>
                                    </div>
                                    <div class="col-sm-4">
                                        
                                        <input class="form-control" id="value3" name="value3"
                                            value="{{ $invoice->subaccountvalue3  ? $invoice->subaccountvalue3 : '' }}" type="number" />
                                    </div>
                            </div>
                        </div>
                    
<div class="form-group" id='line4'>
                                <div class="row">
                                    <div class="col-sm-5">
                                        
                                        <input id="subvalue4" name="subvalue4"
                                            value="{{ $invoice->subaccount4n }}" class="form-control"/>
                                    </div>
                                    <div class="col-sm-4">
                                        
                                        <input class="form-control" id="value4" name="value4"
                                            value="{{ $invoice->subaccountvalue4  ? $invoice->subaccountvalue4 : '' }}" type="number" />
                                    </div>
                            </div>
                        </div>
                    
<div class="form-group" id='line5'>
                                <div class="row">
                                    <div class="col-sm-5">
                                        
                                        <input id="subvalue5" name="subvalue5"
                                            value="{{ $invoice->subaccount5n }}" class="form-control"/>
                                    </div>
                                    <div class="col-sm-4">
                                        
                                        <input class="form-control" id="value5" name="value5"
                                            value="{{ $invoice->subaccountvalue5  ? $invoice->subaccountvalue5 : '' }}" type="number" />
                                    </div>
                            </div>
                        </div>
                    
<div class="form-group" id='line6'>
                                <div class="row">
                                    <div class="col-sm-5">
                                        
                                        <input id="subvalue6" name="subvalue6"
                                            value="{{ $invoice->subaccount6n }}" class="form-control"/>
                                    </div>
                                    <div class="col-sm-4">
                                    
                                        <input class="form-control" id="value6" name="value6"
                                            value="{{ $invoice->subaccountvalue6  ? $invoice->subaccountvalue6 : '' }}" type="number" />
                                    </div>
                            </div>
                        </div>
                    
                        <div class="line" style='margin-bottom:22px'>
                        </div>
                      
                        <hr>
                        <div class="form-group row" id='totals'>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label class="col-sm-8 control-label" for="selectbasic">Total</label>
                                </div>

                                <div class="col-sm-4">
                                    <label class="col-sm-8 control-label" for="selectbasic">Rs. {{ $invoice->Total }}
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
            </div>
        </form>
    </div>
</div>


<button type="button" class="btn btn-primary" style="height:41px ; width:101px ;margin-left: -28px; margin-top: 33px;"
    onclick="printData()">Print Form</button>
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
//     function printData()
// {
//    var divToPrint=document.getElementById("invoice");
//    mywindow= window.open("");
//    mywindow.document.write('<html><head><title></title>');
//    mywindow.document.write('            <link rel="stylesheet"  media="print" href="/core/css/printcss.css" >');  
//    mywindow.document.write(divToPrint.outerHTML);
   
//    mywindow.print();
//    mywindow.close();
// }


function printData()
{
   var divToPrint=document.getElementById("invoice");
   newWin= window.open("", "", "width=800,height=800");;
   newWin.document.write('<head><link type="text/css" rel="stylesheet" href="/core/vendor/bootstrap/css/bootstrap.min.css" media="all"> <link rel="stylesheet"  media="print" href="/core/css/printcss.css" ><!-- Font Awesome CSS--> <link type="text/css" rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css" media="all"> <!-- Custom Font Icons CSS--> <link type="text/css" rel="stylesheet" href="css/font.css" media="all"> <!-- Google fonts - Muli--> <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700" media="all"> <!-- theme stylesheet--> <link type="text/css" rel="stylesheet" href="css/style.default.css" id="theme-stylesheet" media="all"> <!-- Custom stylesheet - for your changes--> <link type="text/css" rel="stylesheet" href="css/custom.css" media="all"> <!-- Favicon--> <link type="text/css" rel="shortcut icon" href="img/favicon1.png" media="all"></head><div class="jumbotron"> <h3>Invoice Voucher<h3></div><div class="container">');
   newWin.document.write(divToPrint.outerHTML);
      newWin.document.write('</div>');

  setTimeout(function () {
   newWin.print();
     newWin.close();
  }, 500);
 
}


  
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="/core/js/print.js"></script>
<script>
    $( function(){
        $('form#invoice input', ).prop('readonly',true);
        $('form#invoice textarea', ).prop('readonly',true);
    });
</script>
@endsection
