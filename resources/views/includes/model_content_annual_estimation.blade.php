<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Actividad</h4>
            </div>
            <div class="modal-body">
                <form>
                    <!--hidden -->
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                        {!! Form::hidden('annual_estimation_id', $annual_estimation_id, ['class' => 'form-control', 'id' => 'annual_estimation_id']) !!}
                    </div>
                    <!--hidden -->
                    <div class="form-group">
                        {!! Form::hidden('type', null, ['class' => 'form-control', 'id' => 'type']) !!}
                    </div>
                    <!--first name--> 
                    <div class="form-group">
                        <label>Nombre:</label>
                        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Nombre', 'maxlength' => '30']) !!}
                        
<!--                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>-->
                        <div id="error_data_one">
                            
                        </div>
                    </div> 
                    <!--first name--> 
                    <div class="form-group">
                        <label>Presupuesto anual:</label>
                        {!! Form::text('annual_estate', null, ['class' => 'form-control', 'id' => 'annual_estate', 'placeholder' => 'Presupuesto anual', 'maxlength' => '10']) !!}
                        <div id="error_data_two">
                            
                        </div>
<!--                        <span class="help-block">
                            <strong>{{ $errors->first('annual_estate') }}</strong>
                        </span>-->
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                {!! Form::button('Guardar', ['class' => 'btn btn-primary', 'id' => 'store_activity', 'name' => 'store_activity']) !!}
                <!--<button type="button" class="btn btn-primary">Guardar</button>-->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->