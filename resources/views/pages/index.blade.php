@extends('layouts.admin-layout')

@section('content')

	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				Pages
			</h3>
			 <p>
				<a href="{{ route('pages.create') }}" class="btn btn-primary">Add New</a>
			</p>
		</div>
		<div class="row">
			<div class="col-12 grid-margin">
				<div class="card">
					<div class="card-body">
					
						<div class="panel panel-default">
							<div class="panel-heading">
								List
							</div>

							<div class="panel-body">
								<table class="table table-bordered table-striped {{ count($pages) > 0 ? 'datatable' : '' }} dt-select">
									<thead>
										<tr>
											<!--<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>-->
											<th>Page Name</th>
											<th>Page Description</th>
											<th>Page Link</th>
											<th>Actions</th>
										</tr>
									</thead>
									
									<tbody>
										@if (count($pages) > 0)
											@foreach ($pages as $page)
												<tr data-entry-id="{{ $page->id }}">
													<td>{{ $page->name }}</td>
													<td><?php echo strip_tags($page->description); ?></td>
													<td class="copy-to-clipboard"><input readonly type="text" value="{{ url('/')}}/{{$page->slug}}"></td>													
													<td>
														<!--<a href="{{ route('pages.show',[$page->id]) }}" class="btn btn-xs btn-primary">View</a>-->
														<a href="{{ route('pages.edit',[$page->id]) }}" class="btn btn-xs btn-primary">Edit</a>
														{!! Form::open(array(
															'style' => 'display: inline-block;',
															'method' => 'DELETE',
															'onsubmit' => "return confirm('Are you sure?');",
															'route' => ['pages.destroy', $page->id])) !!}
														{!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
														{!! Form::close() !!}
													</td>
												</tr>
											@endforeach
										@else
											<tr>
												<td colspan="3">No Record Found</td>
											</tr>
										@endif
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
@section('js_content')
<script type="text/javascript">
	$(function() {
	$('.copy-to-clipboard input').click(function() {
	$(this).focus();
	$(this).select();
	document.execCommand('copy');
	alert("Copied");
    });
});
</script>
@endsection