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
			<th>Modelo</th>
			<th>Ano</th>
			<th>Cor</th>
		</tr>

		@foreach ($veiculos as $key => $veiculo)

			<tr>
				<td>{{ $veiculo->placa}}</td>
				<td>{{ $veiculo->modelo}}</td>
				<td>{{ $veiculo->ano}}</td>
				<td>{{ $veiculo->cor}}</td>
			</tr>	

		@endforeach
	</table>
</div>