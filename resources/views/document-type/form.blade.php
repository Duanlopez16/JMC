<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('uuid') }}
            {{ Form::text('uuid', $documentType->uuid, ['class' => 'form-control' . ($errors->has('uuid') ? ' is-invalid' : ''), 'placeholder' => 'Uuid']) }}
            {!! $errors->first('uuid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $documentType->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('abbreviation') }}
            {{ Form::text('abbreviation', $documentType->abbreviation, ['class' => 'form-control' . ($errors->has('abbreviation') ? ' is-invalid' : ''), 'placeholder' => 'Abbreviation']) }}
            {!! $errors->first('abbreviation', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::text('status', $documentType->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_creator') }}
            {{ Form::text('user_creator', $documentType->user_creator, ['class' => 'form-control' . ($errors->has('user_creator') ? ' is-invalid' : ''), 'placeholder' => 'User Creator']) }}
            {!! $errors->first('user_creator', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_last_update') }}
            {{ Form::text('user_last_update', $documentType->user_last_update, ['class' => 'form-control' . ($errors->has('user_last_update') ? ' is-invalid' : ''), 'placeholder' => 'User Last Update']) }}
            {!! $errors->first('user_last_update', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>