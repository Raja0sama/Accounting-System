@extends('layouts.app')
<title>Receipt Voucher Records</title>
@section('header')

<link rel="stylesheet" type="text/css" href="/core/css/datatable.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<style>
    [cloak] {
        display: none !important;
    }
</style>
@endsection

@section('content')
<div class="col-lg-12" cloak>
    <div class="block">
        <div class="title"><strong>Receipt Voucher Records</strong></div>
        <div class="block-body">
            <form name="form" id="form1" action="" method="post">
                <br>
                <div id="txtshow">
                    <div class="table-responsive">
                        <table id="tables" class="display">
                            <thead>
                                <tr class="table-active">
                                    <th class="table-danger">ID</th>
                                    <th>Date</th>
                                    <th>Chart Account</th>
                                    <th>Main Account</th>
                                    <th>SubAccount</th>
                                    <th>SubAccount</th>
                                    <th>SubAccount</th>
                                    <th>SubAccount</th>
                                    <th>SubAccount</th>
                                    <th>SubAccount</th>
                                    <th>Through</th>
                                    <th>Description</th>
                                    <th>Total</th>
                                    <th>Print</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($receipts as $r)
                                <tr>
                                    <td class="table-active">{{ $r->id  }}</td>
                                    <td class="table-secondary">{{ $r->Date   }}</td>
                                    <td>{{ $r->chartaccountn   }}</td>
                                    <td>{{ $r->name   }}</td>
                                    <td>{{ $r->subaccount1n   }}</td>
                                    <td>{{ $r->subaccount2n   }}</td>
                                    <td>{{ $r->subaccount3n   }}</td>
                                    <td>{{ $r->subaccount4n   }}</td>
                                    <td>{{ $r->subaccount5n   }}</td>
                                    <td>{{ $r->subaccount6n   }}</td>
                                    <td>{{ $r->by   }}</td>
                                    <td>{{ $r->Description   }}</td>
                                    <td class="table-active">{{ $r->Total   }}</td>
                                    <td><a href="{{ route('receipts.show',$r->id)}}">Print</a> </td>
                                </tr>
                                @endforeach
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

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js">
</script>

<script>
    $(document).ready( function () {
        $('#tables').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],

        });
        $('[cloak]').removeAttr('cloak');
    } );
</script>

@endsection
