<style type="text/css">

	table td, table th{

		border:1px solid black;
	}
</style>

<div class="container">
	<br/>
	<table>
		<tr>
			<th>Placa</th>
			<th>Marca</th>
		</tr>

		@foreach ($veiculos as $key => $veiculo)

			<tr>
				<td>{{ $veiculo->placa}}</td>
				<td>{{ $veiculo->marca}}</td>
			</tr>	

		@endforeach
	</table>
</div>