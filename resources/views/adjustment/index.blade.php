@extends('layouts.app')
<title>Payment Voucher Records</title>
@section('header')

<link rel="stylesheet" type="text/css" href="/core/css/datatable.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<style>
    [v-cloak] {
        display: none !important;
    }
</style>
@endsection

@section('content')
<div class="col-lg-12" v-cloak>
    <div class="block">
        <div class="title"><strong>Payment Voucher Records</strong></div>
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
                                    <th>Amount</th>
                                    <th>Chart Account1</th>
                                    <th>Main Account1</th>
                                    <th>SubAccount1</th>
                                    <th>Amount1</th>
                                    <th>Description</th>
                                    <th>Print</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($adjustments as $adjustment)
                                <tr>
                                    <td class="table-active">{{ $adjustment->id }} </td>
                                    <td class="table-secondary">{{ $adjustment->date->toDateString() }}</td>
                                    <td>{{ $adjustment->chartaccount }}</td>
                                    <td>{{ $adjustment->mainaccount }}</td>
                                    <td>{{ $adjustment->subaccount }}</td>
                                    <td>{{ $adjustment->amount }}</td>
                                    <td>{{ $adjustment->chartaccount1 }}</td>
                                    <td>{{ $adjustment->mainaccount1 }}</td>
                                    <td>{{ $adjustment->subaccount1 }}</td>
                                    <td>{{ $adjustment->amount1 }}</td>
                                    <td>{{ $adjustment->description }}</td>
                                    <td><a href="{{ route('adjustments.show',$adjustment->id) }}">Print</a>
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
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
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
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
        $('[v-cloak]').removeAttr('v-cloak');
    } );
</script>

@endsection
