@extends('layouts.app')
<title>Invoices</title>
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
        <div class="title"><strong>Invoices</strong></div>
        <div class="block-body">
                <br>
                <div id="txtshow">
                    <div class="table-responsive">
                        <table id="tables" class="display">
                            <thead>
                                <tr class="table-active">
                                    <th>Print</th>
                                    <th>Edit|Delete </th>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Bill</th>
                                    <th>Customer</th>
                                    <th>SubAccount1</th>
                                    <th>SubAccount2</th>
                                    <th>SubAccount3</th>
                                    <th>SubAccount4</th>
                                    <th>SubAccount5</th>
                                    <th>SubAccount6</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoices as $inv)
                                <tr>
                                    <td><a href="{{ route('invoices.show',$inv->id)}}">Print</a> </td>
                                    <td>
                                        <a href="{{ route('invoices.edit', $inv->id)}}">Edit</a> |
                                        <a href="#" onclick="$('form#invoice_delete_{{$inv->id}}').trigger('submit')">Delete</a>
                                        <div style='display=none'>
                                            <form id='invoice_delete_{{$inv->id}}' method='POST' action="{{ route('invoices.destroy', $inv->id)}}" >
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                        </div>
                                    </td>
                                    <td class="table-active">{{ $inv->id  }}</td>
                                    <td class="table-secondary">{{ $inv->Date   }}</td>
                                    <td>{{ $inv->Bill   }}</td>
                                    <td>{{ $inv->Customern   }}</td>
                                    <td>{{ $inv->subaccount1n   }}</td>
                                    <td>{{ $inv->subaccount2n   }}</td>
                                    <td>{{ $inv->subaccount3n   }}</td>
                                    <td>{{ $inv->subaccount4n   }}</td>
                                    <td>{{ $inv->subaccount5n   }}</td>
                                    <td>{{ $inv->subaccount6n   }}</td>
                                    <td class="table-active" style='text-align:right'>{{ $inv->Total   }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
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
        $('[cloak]').removeAttr('cloak');
        $('#tables').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
    } );
</script>

@endsection
