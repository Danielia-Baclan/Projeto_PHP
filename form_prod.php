<p>
	<form name="form_prod" action="cad_prod.php" method="post">
		
	<p>
		<label>Produto:</label><br>
		<input type="text" name="prod" class="campo">
	</p>

	<p>
		<label>Cor:</label><br>
		<input type="text" name="cor" class="campo">
	</p>

	<p>
		<label>Preço:</label><br>
		<input type="number" name="preco" class="campo" step="0.01">
	</p>

	<p>
		<label>Data de validade:</label><br>
		<input type="date" name="val"><br>
		<label>*Caso o produto não tenha validade deixar no formato atual</label>
	</p>

	<p>
		
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		<button class="btn btn-primary" type="submit">Salvar</button>
	</p>

	</form>

</p>