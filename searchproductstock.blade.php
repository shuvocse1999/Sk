	
@php $i=1;  @endphp
@if(isset($data))
@foreach($data as $d)
<tr id="tr{{ $d->id }}">
	<td>{{ $i++ }}</td>
	<td>{{ $d->pdt_name_en }}<br>{{ $d->pdt_name_bn }}</td>
	<td>{{ $d->quantity }}</td>
	<td>

		@php
		$available = $d->quantity-$d->sales_qty;
		@endphp

		@if($available < 0)
		{{ ($d->sales_qty)+$available }}
		@else
		{{ $d->sales_qty }}
		@endif

	</td>
	<td>

		@if($available < 0)
		0
		@else
		{{ ($d->quantity-$d->sales_qty) }}
		@endif

	</td>
	

</tr>
@endforeach
@endif