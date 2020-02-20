@extends('layouts.app')

@section('header')
<title>Invoice</title>
@endsection

@section('content')

<div class="col-lg-12">
    <div class="block">
        <div class="title"><strong>Invoice</strong></div>
        <div class="block-body">
            <form name="form" id="invoice" action="{{ route("invoices.stores")}}" method="post" class="form-horizontal">
                @csrf
                <div id="HTMLtoPDF">
                    <div class="form-group row" id='NoAndDate'>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="col-md-4 control-label" for="selectbasic">No</label>
                                    <select id="selectbasic" name="selectbasic" value="{{ old('selectbasic') }}"
                                        class="form-control">
                                        <option value="0">{ NEW }</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-md-4 control-label" for="selectbasic"
                                        class="form-control">Date</label>
                                    <input type="date" id="datevalue" name="datevalue" class="form-control"
                                        value="{{ old('datevalue') ?? "2018-00-00 " }}" />
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
                                    <select id="bill" name="bill" class="form-control">
                                        @foreach (\App\Account::where('name','=', 'Supplier')->take(1)->get()
                                        as $account)
                                        <option value="{{ $account->id }}">{{ $account->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-md-4 control-label" for="selectbasic">Customer</label>
                                    <select id="Customer" name="Customer" class="form-control">
                                        <option value>Select Customer</option>
                                        @foreach (\App\Account::where('name','=',
                                        'Supplier')->take(1)->first()->subaccounts()->get()
                                        as $subaccount)
                                        <option value="{{ $subaccount->subid }}">{{ $subaccount->accountname }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <br>
                    {{-- I am not using blade for because for some reason it messes with auto-formating  --}}
                    <?php for($i = 1; $i <= 6; $i++) { ?>
                    <div class="form-group row" id='line{{$i}}' >
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-md-5">
                                    @if ($i==1)
                                    <label class="col-md-4 control-label" for="selectbasic">Sub Account</label>
                                    @endif
                                    <select id="subvalue{{$i}}" name="subvalue{{$i}}" value="{{ old('subvalue' . $i )}}"
                                        class="form-control">
                                        <option value>Select Account</option>
                                        @foreach (\App\Account::where('name','=','Purchases')->take(1)->first()->subaccounts()->get() as $subaccount)
                                        <option value="{{ $subaccount->subid }}">{{ $subaccount->accountname }}
                                        @endforeach
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    @if ($i==1)
                                    <label class="col-md-4 control-label" for="selectbasic">Amount</label>
                                    @endif
                                    <input class="form-control" id="value{{$i}}" v-model=v{{$i}} name="value{{$i}}"
                                        value="{{ old('value' . $i )}}" placeholder="Rs." type="number"
                                        vueAttribute='v{{$i}}'>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($i<6)
                    <div class="line" style='margin-bottom:22px'>  </div>
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
                                    <label class="col-md-8 control-label" for="selectbasic">Rs. @{{ total }}
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
                                <textarea class="form-control" id="description" value="{{ old('description')}}"
                                    maxlength=255 name="description">{{ old('description')}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row" id='buttons'>
                            <div class="col-sm-12 ml-auto">
                                <button type="button" onclick="cancel()" class="btn btn-secondary">Cancel</button>
                                <button type="button" onclick="showAll()" class="btn btn-primary" name="btnshow"
                                    id="btnadd">Show
                                    All</button>
                                <button type="submit" class="btn btn-primary" name="btnadd" id="btnadd">Add To
                                    Database</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

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

@endsection
