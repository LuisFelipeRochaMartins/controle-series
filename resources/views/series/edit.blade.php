<x-layout title="Editar Séries">
    <x-series.form :action="route('series.update',  $series->id)" :name="$series->name" :update="true"/>
</x-layout>
