@extends('Admin.layouts.index')
@section('content')



<div class="content-wrapper">
	<div class="page-heading">
		<h3 class="page-title">Stocks Reports</h3>
	</div>



	<div class="page-content fade-in">
		<div class="ibox">
			<div class="ibox-head mb-3 myhead">
				<div class="ibox-title"><i class="fa fa-list-ul" aria-hidden="true"></i>&nbsp;&nbsp;Search By Stock Reports</div>

			</div>
			<div class="ibox-body">
				<form method="get" action="{{ url("searchstockreports") }}" class="reloadform myinput" target="_blank">
				
					<div class="col-md-12 p-0 row">


						<div class="form-group col-md-3">
							<label>Item Name:<span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group">
								<select class="form-control select2_demo_1" name="pdt_item_id" id=
								"pdt_item_id" required="" onchange="getcat()">
								<option value="">Select Item</option>
								@php
								$item = DB::table('pdt_item')->where('item_status',1)->get();		
								@endphp 
								@foreach($item as $i)
								<option value="{{ $i->item_id  }}">{{ $i->item_name_en }}</option>
								@endforeach
							</select>


						</div>

					</div>


					<div class="form-group col-md-3">
						<label>Category Name:</label>
						<div class="input-group">

							<select class="form-control" name="pdt_cat_id" id="pdt_cat_id">
								<option value="">Select Category</option>
							</select>
						</div>

					</div>




			</div>


		</div>


		<div class="col-12 border p-4 mt-4">
			<center><input type="submit" name="" value="Search Reports" class="btn btn-success" style="width: 200px; font-weight: bold; border-radius: 30px;"></center>
		</div>


	</form>

</div>
</div>

</div>
</div>


<script type="text/javascript">
	function showReport(){

		$('#second').html('');
		$('#first').html('');
		var type = $('#Type').val();
		if(type==''){
			$('#second').html('');
			$('#first').html('');
		}
		else{


			if(type==='1'){

				$('#second').html('');
				$('#first').html('');
				$('#firstdate').css('display','block');
				$('#seconddate').css('display','none');

			}
			else if(type==='3'){
				$('#firstdate').css('display','none');
				$('#seconddate').css('display','none');
				$('#second').html('');
				$('#first').html('');        

				$('#first').append('<label class="control-label ">Select Month</label> <div class="controls"> <select  name="month"  id="month" class="form-control select2_demo_1"><option value="01">January</option><option value="02">February</option><option value="03">March</option> <option value="04">April</option> <option value="05">May</option> <option value="06">June</option> <option value="07">July</option><option value="08">August </option> <option value="09">September </option> <option value="10">October </option> <option value="11">November </option>  <option value="12">December </option></select></div>');

				$('#second').append('<label class="control-label">Year</label><div class="controls"><input type="text" name="year" id="year"   class=" form-control" value="{{date('Y')}}"> </div>');
			}else if(type==='4')
			{
				$('#firstdate').css('display','none');
				$('#seconddate').css('display','none');

				$('#second').html('');
				$('#first').html('');
				$('#first').append('<label class="control-label">Year</label><div class="controls"><input type="text" name="year"  id="year"  placeholder="2021" class=" form-control" value="{{date('Y')}}"> </div>');

			}else if(type==='2')
			{
				$('#first').html('');
				$('#second').html('');

				$('#firstdate').css('display','block');
				$('#seconddate').css('display','block');

			}



			else{

				$('#second').html('');
				$('#first').html('');
			}



		}



	}




	function resetledger()
	{
		location.reload();
		
	}


	function getcat(){
		let item_id = $("#pdt_item_id").val();
		$.ajax({
			url: "{{ url('getcatajax') }}/"+item_id,
			type: 'get',
			data:{},
			success: function (data)
			{
				$("#pdt_cat_id").html(data);
			},
			error:function(errors){
				alert("Select Item")
			}
		});

	}


</script>


@endsection