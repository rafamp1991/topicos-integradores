<style type="text/css">

	table td, table th{

		border:1px solid black;
	}
</style>

<div class="container">
	<br/>
	<table>
		<tr>
			<th>Nome</th>
			<th>Cpf</th>
			<th>Endereço</th>
			<th>E-mail</th>
		</tr>

		@foreach ($clientes as $key => $cliente)

			<tr>
				<td>{{ $cliente->nome}}</td>
				<td>{{ $cliente->cpf}}</td>
				<td>{{ $cliente->endereco}}</td>
				<td>{{ $cliente->email}}</td>
			</tr>	

		@endforeach
	</table>
</div>