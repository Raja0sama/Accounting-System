@extends('layouts.app')

@section('header')
<title>Receipt Voucher</title>
@endsection

@section('content')

<div class="col-lg-12">
    <div class="block">
        <div class="title"><strong>Receipt Voucher</strong></div>
        <div class="block-body">
            <form name="form" id="form1" action="{{ route("receipts.store")}}" method="post" class="form-horizontal">
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
                                        value="{{ old('datevalue') ?? "2018-00-00 " }}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line"> </div> </br>
                    <div class="form-group row" id='ChartaccountTopLine'>
                        <div class="col-sm-12">
                            <div class="row">

                                <div class="col-md-3">
                                    <label class="col-md-12 control-label" for="selectbasic">Chart Of Account</label>
                                    <div class="show_product"></div>
                                    <select id="chartvalue" name="chartvalue" class="form-control"
                                        onchange="chartChanged()" value="{{ old('chartvalue')}}">
                                        <option value>Select Account</option>

                                        @foreach (\App\Chartaccount::all() as $chartaccount)
                                        <option value="{{ $chartaccount->chartid }}">{{ $chartaccount->accountname }}
                                        </option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Main Account</label>
                                    <select id="mainvalue" name="mainvalue" class="form-control"
                                        onchange="mainAccountChanged()">
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Sub Account</label>
                                    <select id="subvalue1" name="subvalue1" value="{{ old('subvalue1')}}"
                                        class="form-control">
                                    </select>
                                </div>


                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Amount</label>
                                    <input class="col-md-8 form-control" id="value1" value="{{ old('value1')}}"
                                        v-model=v1 name="value1" placeholder="Rs." type="number" vueAttribute='v1'>
                                </div>
                            </div>
                        </div>
                    </div>
                    @for ($i = 2; $i <= 6; $i++) <div class="form-group row" id='line{{$i}}'>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>

                                <div class="col-md-3">
                                    <select id="subvalue{{$i}}" name="subvalue{{$i}}" value="{{ old('subvalue' . $i )}}"
                                        class="form-control">
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <input class="col-md-8 form-control" id="value{{$i}}" v-model=v{{$i}}
                                        name="value{{$i}}" value="{{ old('value' . $i )}}" placeholder="Rs."
                                        type="number" vueAttribute='v{{$i}}'>
                                </div>
                            </div>
                        </div>
                </div>
                @endfor
                <hr>
                <div class="form-group row" id='totals'>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3"></div>

                            <div class="col-md-3">
                                <label class="col-md-8 control-label" for="selectbasic">Total</label>
                            </div>

                            <div class="col-md-3">
                                <label class="col-md-8 control-label" for="selectbasic">Rs. @{{ total }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-md-5">
                                <label class="col-md-4 control-label" for="selectbasic">Through</label>
                                <select id="byvalue" name="byvalue" class="form-control">
                                @foreach (\App\Subaccount::where('accountid', '=', '9')->get() as $account)
                                    <option value="{{ $account->subid }}">
                                    {{ $account->accountname }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
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
                                id="btnadd">Show All</button>
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
    function target(e){
        e = e || window.event;
        var target = e.target || e.srcElement;
        return target;
    }

    function chartChanged(){
        chart_id = $('#chartvalue').val();
        params={ chart_id : chart_id };
        axios.get("{{ route('accountsOfChart') }}" , { params: params } ).then( reply=> {
            data=reply.data
            accounts=data.accounts;
            jQuery('#mainvalue').html('');
            jQuery('#mainvalue').html(' <option value >Select Account</option>');
            accounts.forEach(account => {
                $("#mainvalue").append(
                    '<option value= "' + account.id + '" > ' + account.name + '</option>'
                    );
            });
        });
    }

    function mainAccountChanged() {
        var account_id = $('#mainvalue').val();
        params={ account_id : account_id };
        axios.get("{{ route('subaccountsOfAccount') }}" , { params : params }). then (reply => {
            data=reply.data;
            el="[id^='subvalue']"
            $(el).html('');
            $(el).html('<option value >Select Account</option>');
            data.subaccounts.forEach(subAccount => {
                $(el).append(
                    '<option value="' + subAccount.subid + '" >'  + subAccount.accountname + '</option>'
                );
            });
        });
    }

    function cancel(){
        location.reload();
    }

    function showAll(){
        location.href="{{ route("receipts.index") }}"
    }

    function applyOldValues(old){
        for (const field in old) {
            if (old.hasOwnProperty(field)) {
                const value = old[field];
                element=$($('form#form1 input[name=' + field +']')[0] || $('form#form1 select[name=' + field +']')[0]) ;
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
