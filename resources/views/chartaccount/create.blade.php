@extends('layouts.app')

@section('header')
<title>Chart Accounts</title>
<link rel="stylesheet" type="text/css" href="/core/css/datatable.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<style>
    div[v-cloak] {
        display: none;
    }
</style>
@endsection

@section('content')
<div class="col-lg-12" v-cloak>
    <div class="block">
        <div v-if=' ! editChartaccount_id' class="title"><strong>Add Chart Account</strong></div>
        <div v-if='editChartaccount_id' class="title"><strong>Edit Chart Account with id
                @{{editChartaccount_id}}</strong></div>
        <div class="block-body">
            <form name="form" id="newChartaccount" action="" method="post">
                <div>
                    <br>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="col-md-12 control-label" for="selectbasic">Account Name</label>
                                    <input class="form-control" id="chartname" name="chartname"
                                        placeholder="Enter Account Name" v-model='newChartaccount' />
                                </div>
                                <div class="col-md-2">
                                    <label class="col-md-12 control-label" for="selectbasic" class="form-control">Chart
                                        ID</label>
                                    <input class=" form-control" id="chartid" name="chartid" placeholder="Enter ChartID"
                                        v-model='newChartid' />
                                </div>
                                <div class="col-md-2">
                                    <label class="col-md-12 control-label" for="selectbasic" class="form-control">Chart
                                        Type</label>
                                    <Select class="col-md-12 form-control" id="charttype" name="charttype"
                                        placeholder="Select Type" v-model='newCharttype'>
                                        <option value='null' disabled>Select Type</option>
                                        <option value=D>Debit</option>
                                        <option value=C>Credit</option>
                                    </Select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <button v-if='!editChartaccount_id' type="button" class="btn btn-primary" name="btnshow" id="btnadd"
                        v-on:click='createChartaccount'>Create
                        Chart Account</button>
                    <button v-if='editChartaccount_id' type="button" class="btn btn-primary" name="btnshow" id="btnadd"
                    v-on:click='cancelEdit'>Cancel Edit</button>
                    <button v-if='editChartaccount_id' type="button" class="btn btn-primary" name="btnshow" id="btnadd"
                        v-on:click='updateChartaccount'>Update Chart Account</button>
                    <div v-show='chartaccounts && chartaccounts.length ' class="table-responsive">
                        <br>
                        <table id="Chartaccounts" class="display">
                            <thead>
                                <tr class="table-active">
                                    <th class="table-danger">ID</th>
                                    <th>Account Name</th>
                                    <th>Amount</th>
                                    <th>Chart ID</th>
                                    <th>Type</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for='chartaccount in chartaccounts'>
                                    <td class="table-active">@{{chartaccount.id}}</td>
                                    <td class="table-secondary">@{{chartaccount.accountname}}</td>
                                    <td>@{{chartaccount.amount}}</td>
                                    <td>@{{chartaccount.chartid}}</td>
                                    <td>@{{chartaccount.typeName}}</td>
                                    <td>
                                        <a :href="'/chartaccounts/' + chartaccount.id + '/edit/'"
                                            v-on:click.prevent='editChartaccount(chartaccount.id)'>Edit</a> |
                                        <a :href="'/chartaccounts/' + chartaccount.id + '/delete/'"
                                            v-on:click.prevent='deleteChartaccount(chartaccount.id)'>Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('footer')

<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js">
</script>




<script>
    $(document).ready( function () {
        options={
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        };
        VueApp.getChartaccounts('#Chartaccounts', options);
    } );
</script>
@endsection
