@php
    
@endphp

<x-app-layout>

<div>
    Invoice number: {{$invoice->invoice_number}}
    <br>
    Invoice Owner: {{$invoice->user->name}}
</div>
</x-app-layout>
