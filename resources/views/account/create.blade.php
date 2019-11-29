@extends('layouts.app')

@section('header')
<title>Main Accounts</title>
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
        <div v-if=' ! editAccount_id' class="title"><strong>Add Main Account</strong></div>
        <div v-if='editAccount_id' class="title"><strong>Edit Main Account with id
                @{{editAccount_id}}</strong></div>
        <div class="block-body">
            <form name="form" id="newAccount" action="" method="post">
                <div>
                    <br>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="col-md-12 control-label" for="selectbasic">Account Name</label>
                                    <input class="form-control" placeholder="Enter Account Name" v-model='newAccount' />
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-12 control-label" for="selectbasic" class="form-control">Chart
                                        Account</label>
                                    <select class=" form-control" id="chartid" name="chartid" v-model='newChartid'>
                                        <option value='null' disabled>Select Chart Account</option>
                                        <option v-for='chartaccount in chartaccounts' :value='chartaccount.id'>
                                            @{{chartaccount.accountname}}</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <button v-if='!editAccount_id' type="button" class="btn btn-primary" name="btnshow" id="btnadd"
                        v-on:click='createAccount'>Create
                        Account</button>
                    <button v-if='editAccount_id' type="button" class="btn btn-primary" name="btnshow" id="btnadd"
                        v-on:click='cancelEdit'>Cancel Edit</button>
                    <button v-if='editAccount_id' type="button" class="btn btn-primary" name="btnshow" id="btnadd"
                        v-on:click='updateAccount'>Update Account</button>
                    <div v-show='accounts && accounts.length ' class="table-responsive">
                        <br>
                        <table id="Accounts" class="display">
                            <thead>
                                <tr class="table-active">
                                    <th class="table-danger">ID</th>
                                    <th>Account Name</th>
                                    <th>Amount</th>
                                    <th>Chart Account</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for='account in accounts'>
                                    <td class="table-active">@{{account.id}}</td>
                                    <td class="table-secondary">@{{account.name}}</td>
                                    <td>@{{account.amount}}</td>
                                    <td>@{{account.chart.accountname}}</td>
                                    <td>
                                        <a :href="'/Accounts/' + account.id + '/edit/'"
                                            v-on:click.prevent='editAccount(account.id)'>Edit</a> |
                                        <a :href="'/Accounts/' + account.id + '/delete/'"
                                            v-on:click.prevent='deleteAccount(account.id)'>Delete</a>
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
        VueApp.getChartaccounts();
        VueApp.getAccounts('#Accounts', options);
    } );
</script>
@endsection
