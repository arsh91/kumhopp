@extends('layouts.admin-layout')

@section('content')


	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				Vouchers
			</h3>
			 <p>
				<a href="{{ route('vouchers.index') }}" class="btn btn-primary">Vouchers List</a>
			</p>
		</div>
		
		<div class="row">
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Edit</h4>
						{!! Form::model($vouchers, ['method' => 'PUT', 'enctype'=>'multipart/form-data', 'route' => ['vouchers.update', $vouchers->id]]) !!}
												
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="form-group">
										{!! Form::label('Voucher Name', 'Voucher Name*', ['class' => 'control-label']) !!}
										{!! Form::text('voucher_name', old('voucher_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
										@if($errors->has('voucher_name'))
											<p class="help-block text-danger">
												{{ $errors->first('voucher_name') }}
											</p>
										@endif
									</div>
									<div class="form-group">
										{!! Form::label('Voucher Description', 'Voucher Description*', ['class' => 'control-label']) !!}
										{!! Form::textarea('voucher_description', old('voucher_description'), ['class' => 'form-control','id' => 'elm1', 'placeholder' => '']) !!}
										@if($errors->has('voucher_description'))
											<p class="help-block text-danger">
												{{ $errors->first('voucher_description') }}
											</p>
										@endif
									</div>
									<div class="form-group">
										{!! Form::label('Voucher Points', 'Voucher Points*', ['class' => 'control-label']) !!}
										{!! Form::number('points', old('points'), ['class' => 'form-control','id' => 'elm1', 'placeholder' => '']) !!}
										@if($errors->has('points'))
											<p class="help-block text-danger">
												{{ $errors->first('points') }}
											</p>
										@endif
									</div>
									
									<div class="col-xs-12 form-group">
			                            <div class="image_upload">
			                                <input type="file" name="voucher_image" id="imgupload" class="file-upload-default">
			                                	<img src="/uploads/{{ $vouchers->voucher_image }}" class="changeImage" id="myImg" onerror="this.onerror=null;this.src='/img/default.jpg';" />
			                                <button class="file-upload-browse" type="button"><i class="mdi mdi-upload"></i></button>
			                            </div>
			                            @if($errors->has('voucher_image'))
											<div class="invalid-feedback">
												{{ $errors->first('voucher_image') }}
											</div>
										@endif
			                        </div>								
								</div>
							</div>
							{!! Form::submit('Update', ['class' => 'btn btn-danger']) !!}
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
@section('js_content')

    <script type="text/javascript">    

        $(":file").change(function () {
            var selected_img_source = $(this).closest(".image_upload").find(".changeImage");
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    selected_img_source.attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            }
        });

        //Trigger file click event
        $('.file-upload-browse').click(function(){
            var input_file_name = $(this).closest(".image_upload").find("input[type='file']").attr('name');
            $(this).closest(".image_upload").find("input[type='file']").trigger('click');
        });
    </script>
@endsection
