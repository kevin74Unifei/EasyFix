@extends('../templates/template_base')
@section('Base')
<form>
    @include('../templates/components/thumbnail')
    @include('../templates/components/fieldName')
    @include('../templates/components/fieldCPF')
    
    @include('../templates/form/areaEndereco')
    
</form>
@endsection


