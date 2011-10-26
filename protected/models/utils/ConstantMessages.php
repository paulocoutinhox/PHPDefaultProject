<?php

class ConstantMessages
{

	public static function invalidRegistry()
	{
		return 'Registro inválido ou inexistente.';
	}

	public static function addedRegistry($id)
	{
		return 'Registro inserido com sucesso (Código: ' . $id . ').';
	}

	public static function updatedRegistry($id)
	{
		return 'Registro alterado com sucesso (Código: ' . $id . ').';
	}

	public static function cannotModiyOrDelete($id, $message)
	{
		return 'O registro (' . $id . ') não pode ser excluído. (' . $message . ').';
	}

	public static function deletedRegistries()
	{
		return 'Registros excluídos com sucesso.';
	}

	public static function deletedRegistry()
	{
		return 'Registro excluído com sucesso.';
	}

	public static function profileUpdated()
	{
		return 'Seus dados foram alterados com sucesso.';
	}

	public static function notAuthenticated()
	{
		return 'Você não está autenticado no sistema.';
	}

	public static function withoutPermission()
	{
		return 'Você não possui permissão.';
	}

	public static function addTransactionError($message)
	{
		return 'Erro ao tentar inserir registro (Erro: ' . $message . ').';
	}

	public static function updateTransactionError($message)
	{
		return 'Erro ao tentar alterar registro (Erro: ' . $message . ').';
	}

	public static function siteNotAssocPermission()
	{
		return 'Você não tem permissão para executar esta operação.';
	}

}