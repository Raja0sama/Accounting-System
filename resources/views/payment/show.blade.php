@extends('layouts.app')

@section('header')
<title>Payment Voucher</title>

<link rel="stylesheet" type="text/css" href="  https://printjs-4de6.kxcdn.com/print.min.css">

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
                <link rel="stylesheet" href="/core/vendor/bootstrap/css/bootstrap.min.css">

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
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">ChartAccount</label>
                                    <div class="show_product"></div>
                                    <input type="text" id="chartvalue" name="chartvalue" class="form-control"
                                        value="{{ $payment->chartaccountn }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">MainAccount</label>
                                    <input type="text" id="chartvalue" name="chartvalue" class="form-control"
                                        value="{{ $payment->name }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">SubAccount</label>
                                    <input type="text" id="chartvalue" name="chartvalue" class="form-control"
                                        value="{{ $payment->subaccount1n }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Amount</label>
                                    <input class="col-md-8 form-control" id="value1" name="value1"
                                        value="{{ $payment->subaccountvalue1 }}">
                                </div>
                            </div>
                        </div>
                    </div>



        


                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3">
                                    <input type="text" id="subaccount2" name="subaccount2"
                                        class="form-control" value="{{ $payment->subaccount2n }}">
                                </div>
                                <div class="col-md-3">
                                    <input class="col-md-8 form-control" id="subaccountvalue2"
                                        name="subaccountvalue2" value="{{ $payment->subaccountvalue2}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3">
                                    <input type="text" id="subaccount3" name="subaccount3"
                                        class="form-control" value="{{ $payment->subaccount3n }}">
                                </div>
                                <div class="col-md-3">
                                    <input class="col-md-8 form-control" id="subaccountvalue3"
                                        name="subaccountvalue3" value="{{ $payment->subaccountvalue3}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3">
                                    <input type="text" id="subaccount4" name="subaccount4"
                                        class="form-control" value="{{ $payment->subaccount4n }}">
                                </div>
                                <div class="col-md-3">
                                    <input class="col-md-8 form-control" id="subaccountvalue4"
                                        name="subaccountvalue4" value="{{ $payment->subaccountvalue4}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3">
                                    <input type="text" id="subaccount5" name="subaccount5"
                                        class="form-control" value="{{ $payment->subaccount5n }}">
                                </div>
                                <div class="col-md-3">
                                    <input class="col-md-8 form-control" id="subaccountvalue5"
                                        name="subaccountvalue5" value="{{ $payment->subaccountvalue5}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3">
                                    <input type="text" id="subaccount6" name="subaccount6"
                                        class="form-control" value="{{ $payment->subaccount6n }}">
                                </div>
                                <div class="col-md-3">
                                    <input class="col-md-8 form-control" id="subaccountvalue6"
                                        name="subaccountvalue6" value="{{ $payment->subaccountvalue6}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <div class="col-md-12">
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
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="col-md-9 control-label" for="selectbasic">Through</label>

                                    <input type="text" id="chartvalue" name="chartvalue" class="form-control"
                                        value="{{ $payment->by}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <label class="col-md-1 form-control-label">Description</label>
                    <textarea class="col-sm-5 form-control" id="description"
                        name="description">{{ $payment->Description }}</textarea>

                </div>
            </form>
        </div>
    </div>
</div>
<button type="button" class="btn btn-primary" style="height:41px ; width:101px ;margin-left: -16px; margin-top: 33px;"
    onclick="printData()">Print Form</button>
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

    function printData(){
   var divToPrint=document.getElementById("printJS-form");
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
@endsection
