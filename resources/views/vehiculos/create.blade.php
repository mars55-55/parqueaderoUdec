@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Registrar Vehículo</h2>
    <form action="{{ route('vehiculos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="placa">Placa</label>
            <input type="text" name="placa" id="placa" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="tipo">Tipo de Vehículo</label>
            <select name="tipo" id="tipo" class="form-control" required>
                <option value="Auto">Auto</option>
                <option value="Moto">Moto</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" name="color" id="color" class="form-control">
        </div>

        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" name="marca" id="marca" class="form-control">
        </div>

        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" id="modelo" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Registrar Vehículo</button>
    </form>
</div>
@endsection
