<br />

<fieldset>

	<legend>Clientes</legend>

	<table style="width: 100%;" cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td style="width: 70%; padding: 4px; white-space: nowrap;">ATIVOS</td>
			<td style="text-align: right;"><?php echo($customersTotalActive); ?></td>
		</tr>
		<tr>
			<td style="width: 70%; padding: 4px; white-space: nowrap; background-color: #f6f6f6;">SUSPENSOS</td>
			<td style="text-align: right; background-color: #f6f6f6;"><?php echo($customersTotalSuspended); ?></td>
		</tr>
		<tr>
			<td style="width: 70%; padding: 4px; white-space: nowrap; border-bottom: 1px solid #ccc;">NÃO CONFIRMADOS</td>
			<td style="text-align: right; border-bottom: 1px solid #ccc;"><?php echo($customersTotalInactive); ?></td>
		</tr>
		<tr>
			<td style="width: 70%; padding: 4px; white-space: nowrap; font-weight: bold;">TOTAL</td>
			<td style="text-align: right; font-weight: bold;"><?php echo($customersTotal); ?></td>
		</tr>
	</table>

</fieldset>

<br />
<br />

<fieldset>

	<legend>Vendas</legend>

	<table style="width: 100%;" cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td style="width: 70%; padding: 4px; white-space: nowrap;">ATIVAS</td>
			<td style="text-align: right;"><?php echo($salesTotalActive); ?></td>
		</tr>
		<tr>
			<td style="width: 70%; padding: 4px; white-space: nowrap; background-color: #f6f6f6;">EXPIRADAS</td>
			<td style="text-align: right; background-color: #f6f6f6;"><?php echo($salesTotalExpired); ?></td>
		</tr>
		<tr>
			<td style="width: 70%; padding: 4px; white-space: nowrap;">FUTURAS</td>
			<td style="text-align: right;"><?php echo($salesTotalFuture); ?></td>
		</tr>
		<tr>
		<tr>
			<td style="width: 70%; padding: 4px; white-space: nowrap; background-color: #f6f6f6; border-bottom: 1px solid #ccc;">ENCERRADAS</td>
			<td style="text-align: right; background-color: #f6f6f6; border-bottom: 1px solid #ccc;"><?php echo($salesTotalClosed); ?></td>
		</tr>
		<tr>
			<td style="width: 70%; padding: 4px; white-space: nowrap; font-weight: bold;">TOTAL</td>
			<td style="text-align: right; font-weight: bold;"><?php echo($salesTotal); ?></td>
		</tr>
	</table>

</fieldset>