@extends('layouts.app')

@section('header')
<title>Adjustment</title>
@endsection

@section('content')
<div class="col-lg-12">
    <div class="block">
        <div class="title"><strong>Adjustment</strong></div>
        <div class="block-body">
            <form name="form" id="adjustment" action="{{route('adjustments.store')}}" method="post" class="form-horizontal">
                @csrf
                <div id="HTMLtoPDF">
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="col-md-4 control-label" for="selectbasic">No</label>
                                    <select id="selectbasic" name="selectbasic" class="form-control">
                                        <option value>{NEW}</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-md-4 control-label" for="selectbasic"
                                        class="form-control">Date</label>
                                    <input type="date" id="datevalue" name="datevalue" class="form-control"
                                        value="2018-00-00 " min="2018-01-01" max="2018-12-31" />
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
                                    <select id="chartvalue" name="chartvalue" class="form-control" v-model='chartaccount' vueAttribute='chartaccount'>
                                        <option :value="null" disabled>Select Account</option>
                                        @foreach (\App\Chartaccount::all() as $chartaccount)
                                        <option value="{{ $chartaccount->chartid }}">{{ $chartaccount->accountname }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Main Account</label>
                                    <select id="mainvalue" name="mainvalue" class="form-control" v-model='mainaccount'  vueAttribute='mainaccount'>
                                        <option v-if='mainaccounts && mainaccounts.length>1'  :value="null" disabled >Select Account</option>
                                        @verbatim
                                        <option v-for='account in mainaccounts' :value='account.id'>{{account.name}}</option>
                                        @endverbatim
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Sub Account</label>
                                    <select id="subvalue" name="subvalue" class="form-control" v-model='subaccount'  vueAttribute='subaccount'>
                                        <option v-if='subaccounts && subaccounts.length>1'  :value="null" disabled >Select Account</option>
                                        @verbatim
                                        <option v-for='account in subaccounts' :value='account.subid'>{{account.accountname}}</option>
                                        @endverbatim
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Debit</label>
                                    <input class="col-md-8 form-control" id="value" name="value" placeholder="Rs."
                                        type="number" v-model='CreditDebit' />
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
                                    <select id="chartvalue1" name="chartvalue1" class="form-control" v-model='chartaccount1'  vueAttribute='chartaccount1' >
                                        <option :value="null" disabled>Select Account</option>
                                        @foreach (\App\Chartaccount::all() as $chartaccount)
                                        <option value="{{ $chartaccount->chartid }}">{{ $chartaccount->accountname }}
                                        </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Main Account</label>
                                    <select id="mainvalue1" name="mainvalue1" class="form-control" v-model='mainaccount1'  vueAttribute='mainaccount1'>
                                        <option v-if='mainaccounts1 && mainaccounts1.length>1'  :value="null" disabled >Select Account</option>
                                        @verbatim
                                        <option v-for='account in mainaccounts1' :value='account.id'>{{account.name}}</option>
                                        @endverbatim
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Sub Account</label>
                                    <select id="subvalue1" name="subvalue1" class="form-control" v-model='subaccount1'  vueAttribute='subaccount1'>
                                        <option v-if='subaccounts1 && subaccounts1.length>1'  :value="null" disabled >Select Account</option>
                                        <option v-for='account in subaccounts1' :value='account.subid'>@{{account.accountname}}</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Credit</label>
                                    <input class="col-md-8 form-control" id="value1" name="value1" placeholder="Rs."
                                        type="number" v-model='CreditDebit'   vueAttribute='CreditDebit'/>
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
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 ml-auto">
                                <button type="button" class="btn btn-secondary" onclick="cancel()">Cancel</button>
                                <button type="button" class="btn btn-primary" name="btnshow" id="btnadd" onclick="showAll()">Show All</button>
                                <button type="submit" class="btn btn-primary" name="btnadd" id="btnadd">Add To Database</button>
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
    location.href="{{ route("adjustments.index") }}"
}

function applyOldValues(old){
    for (const field in old) {
        if (old.hasOwnProperty(field)) {
            const value = old[field];
            console.log('Setting ' + field + ' to ' + value)
            element=$($('form#adjustment input[name=' + field +']')[0] || $('form#adjustment select[name=' + field +']')[0]) ;
            if (element.attr('name') && (element.attr('type')!='hidden')) {
                element.val(value);
                if (element.attr('vueAttribute')){
                    console.log('Setting also Vue Element ' + element.attr('vueAttribute') + ' to ' + value)
                    Vue.nextTick(function() { VueApp[element.attr('vueAttribute')]=value } )
                } else {
                }
            } else {
                console.log(field + ' skipped or not found ')
            }
            delete old[field];
            setTimeout(function() { applyOldValues(old) },100);
            return null
        }
    }
}

$( function () {
    old= {!! json_encode(old()) !!}
    bold=Object.values(old);
    console.log(bold);
    applyOldValues(old);
})

</script>
@endsection
