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
			<th>Categoria</th>
		</tr>

		@foreach ($motoristas as $key => $motorista)

			<tr>
				<td>{{ $motorista->nome}}</td>
				<td>{{ $motorista->cpf}}</td>
				<td>{{ $motorista->endereco}}</td>
				<td>{{ $motorista->email}}</td>
				<td>{{ $motorista->categoria}}</td>
			</tr>	

		@endforeach
	</table>
</div>