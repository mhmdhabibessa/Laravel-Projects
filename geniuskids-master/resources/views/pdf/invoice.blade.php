@extends('pdf.app')

@section('content')
    <div>
        <h2 class="text-center">
            Proforma Invoice
        </h2>
        <div>
            <hr>
            <table class="mb-2">
                <tr>
                    <td>
                    </td>
                    <td>
                        Date: {{ $data['income']->created_at->format('d-m-Y') }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Father Name: {{ $data['order']->father_name }}
                    </td>
                    <td>
                        Mobile: {{ $data['order']->main_contact }}
                    </td>

                </tr>
                <tr>
                    <td>
                        Mother Name: {{ $data['order']->mother_name }}
                    </td>
                    <td>
                        Email: {{ $data['order']->email }}
                    </td>

                </tr>
            </table>
            <hr>
            <table>
                <tr>
                    <td class="bg-light-grey">
                        Total:
                    </td>
                    <td>
                        AED {{ number_format($data['income']->amount - $data['income']->vat, 2) }} /-
                    </td>
                </tr>
                <tr>
                    <td class="bg-light-grey">
                        VAT (5%):
                    </td>
                    <td>
                        AED {{ number_format($data['income']->vat, 2) }} /-
                    </td>
                </tr>
                <tr>
                    <td class="bg-light-grey">
                        Grand Total:
                    </td>
                    <td>
                        AED {{ number_format($data['income']->amount, 2) }} /-
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
@section('footer')
    <br>
@endsection
