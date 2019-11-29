@extends('layouts.app')

@section('header')
<title>Sub Accounts</title>
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
        <div v-if=' ! editSubaccount_id' class="title"><strong>Add Sub Account</strong></div>
        <div v-if='editSubaccount_id' class="title"><strong>Edit Sub Account with id
                @{{editSubaccount_id}}</strong></div>
        <div class="block-body">
            <form name="form" id="newSubaccount" action="" method="post">
                <div>
                    <br>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="col-md-12 control-label" for="selectbasic">Sub Account Name</label>
                                    <input class="form-control" placeholder="Enter Sub Account Name" v-model='newSubaccount' />
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-12 control-label" for="selectbasic" class="form-control">Main
                                        Account</label>
                                    <select class=" form-control" id="mainaccountid" name="accountid" v-model='newAccount_id'>
                                        <option value='null' disabled>Select Main Account</option>
                                        <option v-for='account in accounts' :value='account.id'>
                                            @{{account.name}}</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <button v-if='!editSubaccount_id' type="button" class="btn btn-primary" name="btnshow" id="btnadd"
                        v-on:click='createSubaccount'>Create
                        Sub Account</button>
                    <button v-if='editSubaccount_id' type="button" class="btn btn-primary" name="btnshow" id="btnadd"
                        v-on:click='cancelEdit'>Cancel Edit</button>
                    <button v-if='editSubaccount_id' type="button" class="btn btn-primary" name="btnshow" id="btnadd"
                        v-on:click='updateSubaccount'>Update Sub Account</button>
                    <div v-show='subaccounts && subaccounts.length ' class="table-responsive">
                        <br>
                        <table id="Subaccounts" class="display">
                            <thead>
                                <tr class="table-active">
                                    <th class="table-danger">ID</th>
                                    <th>Sub Account Name</th>
                                    <th>Amount</th>
                                    <th>Main Account</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for='subaccount in subaccounts'>
                                    <td class="table-active">@{{subaccount.subid}}</td>
                                    <td class="table-secondary">@{{subaccount.accountname}}</td>
                                    <td>@{{subaccount.amount}}</td>
                                    <td>@{{subaccount.mainaccount.name}}</td>
                                    <td>
                                        <a :href="'/subaccounts/' + subaccount.subid + '/edit/'"
                                            v-on:click.prevent='editSubaccount(subaccount.subid)'>Edit</a> |
                                        <a :href="'/subaccounts/' + subaccount.subid + '/delete/'"
                                            v-on:click.prevent='deleteSubaccount(subaccount.subid)'>Delete</a>
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
        VueApp.getAccounts();
        VueApp.getSubaccounts('#Subaccounts', options);
    } );
</script>
@endsection
