@extends('master') 
@section('contenido')
<div class="container">
    <h1 style="text-align: center;">Bienvenido A Drogueria Colombia</h1>
    <h2 style="text-align: center;margin-top: 50px;">Ofertas Para Tí</h2>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6" style="margin-top: 50px;">
            <div class="card text-center">
                <div class="card-header">
                  ARAWAK
                </div>
                <div class="card-body">
                    <img src='{{url("/imagenes/oferta1.jpg")}}' alt="" style="width: 450px;">
                    <h5 class="card-title">Protector Solar Sundark Spf 60 Gel Arawak Caja X 120Gr</h5>
                    <h2 class="card-text" style="color: red;">$28.800 (Oferta)</h2>
                    <h6 class="card-text" style="color: grey;"><s>$36.550 (Normal)</s></h6>
                    <a href="#" class="btn btn-primary">Comprar</a>
                </div>
                <div class="card-footer text-muted">
                    <input type="text" style="text-align: center;" name="fecha"  value="<?php echo date("Y-m-d");?>" disabled>
                </div>
            </div>
        </div>
        </br>
        <div class="col-md-6" style="margin-top: 50px;">
            <div class="card text-center">
                <div class="card-header">
                  MOVIDOL
                </div>
                <div class="card-body">
                    <img src='{{url("/imagenes/oferta2.jpg")}}' alt="" style="width: 450px;">
                    <h5 class="card-title">LABORATORIO FRANCO COLOMBIANO LAFRANCOL SAS Movidol Caja X 12 Tabletas</h5>
                    <h2 class="card-text" style="color: red;">$12.320 (Oferta)</h2>
                    <h6 class="card-text" style="color: grey;"><s>$15.400 (Normal) </s></h6>
                    <a href="#" class="btn btn-primary">Comprar</a>
                </div>
                <div class="card-footer text-muted">
                    <input type="text" style="text-align: center;" name="fecha"  value="<?php echo date("Y-m-d");?>" disabled>
                </div>
            </div>
        </div>
        <div class="col-md-6" style="margin-top: 50px;">
            <div class="card text-center">
                <div class="card-header">
                  MOVIDOL
                </div>
                <div class="card-body">
                    <img src='{{url("/imagenes/oferta2.jpg")}}' alt="" style="width: 450px;">
                    <h5 class="card-title">LABORATORIO FRANCO COLOMBIANO LAFRANCOL SAS Movidol Caja X 24 Tabletas</h5>
                    <h2 class="card-text" style="color: red;">$21.320 (Oferta)</h2>
                    <h6 class="card-text" style="color: grey;"><s>$28.400 (Normal) </s></h6>
                    <a href="#" class="btn btn-primary">Comprar</a>
                </div>
                <div class="card-footer text-muted">
                    <input type="text" style="text-align: center;" name="fecha"  value="<?php echo date("Y-m-d");?>" disabled>
                </div>
            </div>
        </div>
    </div>
    
    
</div>
 

@stop
