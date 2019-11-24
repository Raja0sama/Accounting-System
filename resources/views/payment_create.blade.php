@extends('layouts.app')

@section('header')
@endsection

@section('content')

<div class="col-lg-12">
    <div class="block">
        <div class="title"><strong>Payment Voucher</strong></div>
        <div class="block-body">
            <form name="form" id="form1" action="{{ route("payments.store")}}" method="post" class="form-horizontal">
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
                                        value="{{ old('datevalue') ?? "2018-00-00 " }}" min="2018-01-01"
                                        max="2018-12-31" />
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
                                    @foreach (\App\Account::where('name', '=', 'petty cash')->get() as $account)
                                    <option value="{{ $account->id }}">
                                        {{ $account->name }}
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
            data.subAccounts.forEach(subAccount => {
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
        location.href="{{ route("payments.index") }}"
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

@section ('hide')
error_reporting(1); <<<------ check this if(isset($_POST['projectId'])) { $myid=$_POST['projectId']; echo $myid; }
    if(isset($_POST['btnadd'])){ $date=$_POST['datevalue']; $date=$_POST['datevalue']; if ($date==='' ) {
    echo "<script>alert('Date Is empty');</script>" ; } else{ $mainvalue=$_POST['mainvalue'];
    $main="SELECT accountname FROM `account` where accountid=" .$mainvalue; $exe2=mysqli_query($con,$main); if($exe2){
    while($row2=mysqli_fetch_array($exe2)){ $mainvalue1=$row2['accountname']; } }else{ echo "problem" ; }
    $subvalue=$_POST['subvalue']; $sub="SELECT  `accountname`, `accountid`, `subid` FROM `subaccount` where subid="
    .$subvalue; $exe4=mysqli_query($con,$sub); if($exe4){ while($row4=mysqli_fetch_array($exe4)){
    $subvalue1=$row4['accountname']; } }
    $sub1="SELECT  `accountname`, `accountid`, `subid` FROM `subaccount` where subid=" .$_POST['subvalue1'];
    $exe41=mysqli_query($con,$sub1); if($exe41){ while($row41=mysqli_fetch_array($exe41)){
    $subvalue11=$row41['accountname']; } }
    $sub11="SELECT  `accountname`, `accountid`, `subid` FROM `subaccount` where subid=" .$_POST['subvalue2'];
    $exe411=mysqli_query($con,$sub11); if($exe411){ while($row411=mysqli_fetch_array($exe411)){
    $subvalue22=$row411['accountname']; } }
    $sub111="SELECT  `accountname`, `accountid`, `subid` FROM `subaccount` where subid=" .$_POST['subvalue3'];
    $exe4111=mysqli_query($con,$sub111); if($exe4111){ while($row4111=mysqli_fetch_array($exe4111)){
    $subvalue33=$row4111['accountname']; } }
    $sub1111="SELECT  `accountname`, `accountid`, `subid` FROM `subaccount` where subid=" .$_POST['subvalue4'];
    $exe41111=mysqli_query($con,$sub1111); if($exe41111){ while($row41111=mysqli_fetch_array($exe41111)){
    $subvalue44=$row41111['accountname']; } }
    $sub11111="SELECT  `accountname`, `accountid`, `subid` FROM `subaccount` where subid=" .$_POST['subvalue5'];
    $exe411111=mysqli_query($con,$sub11111); if($exe411111){ while($row411111=mysqli_fetch_array($exe411111)){
    $subvalue55=$row411111['accountname']; } } $description=$_POST['description']; $value1=$_POST['value1'];
    $value2=$_POST['value2']; $value3=$_POST['value3']; $value4=$_POST['value4']; $value5=$_POST['value5'];
    $value6=$_POST['value6']; $chartvalue=$_POST['chartvalue'];
    $chart="SELECT accountname FROM `chartaccount` where chartid=" .$chartvalue; $exe1=mysqli_query($con,$chart);
    if($exe1){ while($row1=mysqli_fetch_array($exe1)){ $chartvalue1=$row1['accountname']; } }else{ echo "problem" ; }
    $sum=$value1+$value2+$value3+$value4+$value5+$value6; $checkvalue=$_POST['chartvalue'];
    $checkmainvalue=$_POST['mainvalue']; $checksubvalue=$_POST['subvalue']; $checksubvalue1=$_POST['subvalue1'];
    $checksubvalue2=$_POST['subvalue2']; $checksubvalue3=$_POST['subvalue3']; $checksubvalue4=$_POST['subvalue4'];
    $checksubvalue5=$_POST['subvalue5']; if($checkvalue==1) {
    $assetamountquery="SELECT `amount` FROM `chartaccount` where chartid=1" ;
    $assetexe=mysqli_query($con,$assetamountquery); if($assetexe){ while($assetrow=mysqli_fetch_array($assetexe)){
    $assetamount=$assetrow['amount']; } } $assetresult=$assetamount+$sum;
    $amountquery="UPDATE `chartaccount` SET `amount` = " .$assetresult." where chartid=1";
    $exe=mysqli_query($con,$amountquery); $assetamountquery1="SELECT `amount` FROM `account` where accountid="
    .$checkmainvalue; $assetexe10=mysqli_query($con,$assetamountquery1); if($assetexe10){
    while($assetrow=mysqli_fetch_array($assetexe10)){ $assetamount1=$assetrow['amount']; } }
    $assetresult1=$assetamount1+$sum; $amountquery1="UPDATE `account` SET `amount` = " .$assetresult1." where accountid=".$checkmainvalue;
  $exe10 = mysqli_query($con,$amountquery1);

$checkvalue = "";


if($value1 !="")
{
 $amountquery11 = " UPDATE `subaccount` SET `amount`=`amount` + ".$value1." where subid=".$checksubvalue;
  $exe101 = mysqli_query($con,$amountquery11);

}
if($value2 !="")
{
 $amountquery111 = " UPDATE `subaccount` SET `amount`=`amount` + ".$value2." where subid=".$checksubvalue1;
  $exe1011 = mysqli_query($con,$amountquery111);


}
if($value3 !="")
{
 $amountquery1111 = " UPDATE `subaccount` SET `amount`=`amount` + ".$value3." where subid=".$checksubvalue2;
  $exe10111 = mysqli_query($con,$amountquery1111);

}
if($value4 !="")
{
 $amountquery11111 = " UPDATE `subaccount` SET `amount`=`amount` + ".$value4." where subid=".$checksubvalue3;
  $exe101111 = mysqli_query($con,$amountquery11111);


}
if($value5 !="")
{
 $amountquery111111 = " UPDATE `subaccount` SET `amount`=`amount` + ".$value5." where subid=".$checksubvalue4;
  $exe1011111 = mysqli_query($con,$amountquery111111);


}
if($value6 !="")
{
 $amountquery1111111 = " UPDATE `subaccount` SET `amount`=`amount` + ".$value6." where subid=".$checksubvalue5;
  $exe10111111 = mysqli_query($con,$amountquery1111111);


}



}
   if($checkvalue==2)
{

	$assetamountquery= " SELECT `amount` FROM `chartaccount` where chartid=2";
    $assetexe=mysqli_query($con,$assetamountquery); if($assetexe){ while($assetrow=mysqli_fetch_array($assetexe)){
    $assetamount=$assetrow['amount']; } } $assetresult=$assetamount-$sum;
    $amountquery="UPDATE `chartaccount` SET `amount` = " .$assetresult." where chartid=2";
    $exe=mysqli_query($con,$amountquery); $amountquery1="UPDATE `account` SET `amount` = `amount` - " .$sum." where
    accountid=".$checkmainvalue;
  $exe10 = mysqli_query($con,$amountquery1);


$checkvalue = "";

if($value1 !="")
{
 $amountquery11 = " UPDATE `subaccount` SET `amount`=`amount` - ".$value1." where subid=".$checksubvalue;
  $exe101 = mysqli_query($con,$amountquery11);

}
if($value2 !="")
{
 $amountquery111 = " UPDATE `subaccount` SET `amount`=`amount` - ".$value2." where subid=".$checksubvalue1;
  $exe1011 = mysqli_query($con,$amountquery111);


}
if($value3 !="")
{
 $amountquery1111 = " UPDATE `subaccount` SET `amount`=`amount` - ".$value3." where subid=".$checksubvalue2;
  $exe10111 = mysqli_query($con,$amountquery1111);

}
if($value4 !="")
{
 $amountquery11111 = " UPDATE `subaccount` SET `amount`=`amount` - ".$value4." where subid=".$checksubvalue3;
  $exe101111 = mysqli_query($con,$amountquery11111);


}
if($value5 !="")
{
 $amountquery111111 = " UPDATE `subaccount` SET `amount`=`amount` - ".$value5." where subid=".$checksubvalue4;
  $exe1011111 = mysqli_query($con,$amountquery111111);


}
if($value6 !="")
{
 $amountquery1111111 = " UPDATE `subaccount` SET `amount`=`amount` - ".$value6." where subid=".$checksubvalue5;
  $exe10111111 = mysqli_query($con,$amountquery1111111);


}

}
 if($checkvalue==4)
{

	$assetamountquery= " SELECT `amount` FROM `chartaccount` where chartid=4";
    $assetexe=mysqli_query($con,$assetamountquery); if($assetexe){ while($assetrow=mysqli_fetch_array($assetexe)){
    $assetamount=$assetrow['amount']; } } $assetresult=$assetamount+$sum;
    $amountquery="UPDATE `chartaccount` SET `amount` = " .$assetresult." where chartid=4";
    $exe=mysqli_query($con,$amountquery); $amountquery1="UPDATE `account` SET `amount` = `amount` + " .$sum." where
    accountid=".$checkmainvalue;
  $exe10 = mysqli_query($con,$amountquery1);


$checkvalue = "";


if($value1 !="")
{
 $amountquery11 = " UPDATE `subaccount` SET `amount`=`amount` + ".$value1." where subid=".$checksubvalue;
  $exe101 = mysqli_query($con,$amountquery11);

}
if($value2 !="")
{
 $amountquery111 = " UPDATE `subaccount` SET `amount`=`amount` + ".$value2." where subid=".$checksubvalue1;
  $exe1011 = mysqli_query($con,$amountquery111);


}
if($value3 !="")
{
 $amountquery1111 = " UPDATE `subaccount` SET `amount`=`amount` + ".$value3." where subid=".$checksubvalue2;
  $exe10111 = mysqli_query($con,$amountquery1111);

}
if($value4 !="")
{
 $amountquery11111 = " UPDATE `subaccount` SET `amount`=`amount` + ".$value4." where subid=".$checksubvalue3;
  $exe101111 = mysqli_query($con,$amountquery11111);


}
if($value5 !="")
{
 $amountquery111111 = " UPDATE `subaccount` SET `amount`=`amount` + ".$value5." where subid=".$checksubvalue4;
  $exe1011111 = mysqli_query($con,$amountquery111111);


}
if($value6 !="")
{
 $amountquery1111111 = " UPDATE `subaccount` SET `amount`=`amount` + ".$value6." where subid=".$checksubvalue5;
  $exe10111111 = mysqli_query($con,$amountquery1111111);


}

}
if($checkvalue==5)
{

	$assetamountquery= " SELECT `amount` FROM `chartaccount` where chartid=5";
    $assetexe=mysqli_query($con,$assetamountquery); if($assetexe){ while($assetrow=mysqli_fetch_array($assetexe)){
    $assetamount=$assetrow['amount']; } } $assetresult=$assetamount-$sum;
    $amountquery="UPDATE `chartaccount` SET `amount` = " .$assetresult." where chartid=5";
    $exe=mysqli_query($con,$amountquery); $checkvalue="" ; $amountquery1="UPDATE `account` SET `amount` = `amount` - "
    .$sum." where accountid=".$checkmainvalue;
  $exe10 = mysqli_query($con,$amountquery1);



if($value1 !="")
{
 $amountquery11 = " UPDATE `subaccount` SET `amount`=`amount` - ".$value1." where subid=".$checksubvalue;
  $exe101 = mysqli_query($con,$amountquery11);

}
if($value2 !="")
{
 $amountquery111 = " UPDATE `subaccount` SET `amount`=`amount` - ".$value2." where subid=".$checksubvalue1;
  $exe1011 = mysqli_query($con,$amountquery111);


}
if($value3 !="")
{
 $amountquery1111 = " UPDATE `subaccount` SET `amount`=`amount` - ".$value3." where subid=".$checksubvalue2;
  $exe10111 = mysqli_query($con,$amountquery1111);

}
if($value4 !="")
{
 $amountquery11111 = " UPDATE `subaccount` SET `amount`=`amount` - ".$value4." where subid=".$checksubvalue3;
  $exe101111 = mysqli_query($con,$amountquery11111);


}
if($value5 !="")
{
 $amountquery111111 = " UPDATE `subaccount` SET `amount`=`amount` - ".$value5." where subid=".$checksubvalue4;
  $exe1011111 = mysqli_query($con,$amountquery111111);


}
if($value6 !="")
{
 $amountquery1111111 = " UPDATE `subaccount` SET `amount`=`amount` - ".$value6." where subid=".$checksubvalue5;
  $exe10111111 = mysqli_query($con,$amountquery1111111);


}

}

 if($checkvalue==3)
{

	$assetamountquery= " SELECT `amount` FROM `chartaccount` where chartid=3";
    $assetexe=mysqli_query($con,$assetamountquery); if($assetexe){ while($assetrow=mysqli_fetch_array($assetexe)){
    $assetamount=$assetrow['amount']; } } $assetresult=$assetamount-$sum;
    $amountquery="UPDATE `chartaccount` SET `amount` = " .$assetresult." where chartid=3";
    $exe=mysqli_query($con,$amountquery); $checkvalue="" ; $amountquery1="UPDATE `account` SET `amount` = `amount` - "
    .$sum." where accountid=".$checkmainvalue;
  $exe10 = mysqli_query($con,$amountquery1);



if($value1 !="")
{
 $amountquery11 = " UPDATE `subaccount` SET `amount`=`amount` - ".$value1." where subid=".$checksubvalue;
  $exe101 = mysqli_query($con,$amountquery11);

}
if($value2 !="")
{
 $amountquery111 = " UPDATE `subaccount` SET `amount`=`amount` - ".$value2." where subid=".$checksubvalue1;
  $exe1011 = mysqli_query($con,$amountquery111);


}
if($value3 !="")
{
 $amountquery1111 = " UPDATE `subaccount` SET `amount`=`amount` - ".$value3." where subid=".$checksubvalue2;
  $exe10111 = mysqli_query($con,$amountquery1111);

}
if($value4 !="")
{
 $amountquery11111 = " UPDATE `subaccount` SET `amount`=`amount` - ".$value4." where subid=".$checksubvalue3;
  $exe101111 = mysqli_query($con,$amountquery11111);


}
if($value5 !="")
{
 $amountquery111111 = " UPDATE `subaccount` SET `amount`=`amount` - ".$value5." where subid=".$checksubvalue4;
  $exe1011111 = mysqli_query($con,$amountquery111111);


}
if($value6 !="")
{
 $amountquery1111111 = " UPDATE `subaccount` SET `amount`=`amount` - ".$value6." where subid=".$checksubvalue5;
  $exe10111111 = mysqli_query($con,$amountquery1111111);


}


}



    $byvalue = $_POST['byvalue'];
   $byvaluex1 = " SELECT accountname FROM `account` where accountid=".$byvalue;
  $exe1a = mysqli_query($con,$byvaluex1);
if($exe1a){
  while($row1a = mysqli_fetch_array($exe1a)){
  $byvaluex = $row1a['accountname'];
  }
}


 $byquery = " UPDATE `account` SET `amount`=`amount` - ".$sum." where accountname='petty cash'";
  $exeby = mysqli_query($con,$byquery);



  $query= " INSERT INTO `payment`(`Date`, `chartaccount`, `mainaccount`, `subaccount`, `subaccount1`, `subaccount2`,
    `subaccount3`, `subaccount4`, `subaccount5`, `subaccountvalue`, `subaccountvalue1`, `subaccountvalue2`,
    `subaccountvalue3`, `subaccountvalue4`, `subaccountvalue5`, `by`, `Description`, `Total`) VALUES
    ('$date','$chartvalue1','$mainvalue1','$subvalue1','$subvalue11','$subvalue22','$subvalue33','$subvalue44','$subvalue55','$value1','$value2','$value3','$value4','$value5','$value6','$byvaluex','$description',$sum)";
    $exe=mysqli_query($con,$query); if($exe){ echo "" ; echo "<script>alert('Inserted')</script>" ; }else{ echo "failed"
    ; } } } }else{ header('Location:login.php'); } error_reporting(1); ?>




    ===============
    @endsection
