<style type="text/css">

	table td, table th{

		border:1px solid black;
	}
</style>

<div class="container">
	<br/>
	<table>
		<tr>
			<th>Cidade</th>
			<th>Endereço de Entrega</th>
			<th>Código da rota</th>
		</tr>

		@foreach ($rotas as $key => $rota)

			<tr>
				<td>{{ $rota->cidade}}</td>
				<td>{{ $rota->endereco_entrega}}</td>
				<td>{{ $rota->cod_rota}}</td>
			</tr>	

		@endforeach
	</table>
</div>