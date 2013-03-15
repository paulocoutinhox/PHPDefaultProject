<?php

class WebResponse
{

	const RESPONSE_TYPE_JSON = 'json';
	const RESPONSE_TYPE_XML  = 'xml';

	public $responseType;
	public $response;

	function __construct($responseType = self::RESPONSE_TYPE_JSON)
	{
		$this->responseType = $responseType;
		$this->response     = $this->createResponseAsArray();

		if ($responseType == self::RESPONSE_TYPE_JSON)
		{

		}
		else
		{
			throw new Exception('Tipo de resposta (' . $this->responseType . ') não implementada.');
		}
	}

	public function mergeModelErrors($model, $message = 'validate')
	{
		if ($model)
		{
			if ($model->getErrors())
			{
				$errorList = array();

				foreach($model->getErrors() as $key => $value)
				{
					$errorList[] = array($key, $value);
				}

				if (!isset($this->response['errors']))
				{
					$this->response['data']['errors'] = array();
				}

				$this->response['data']['errors'] = array_merge($this->response['data']['errors'], $errorList);
				$this->response['message'] = $message;
			}
		}
	}

	public function setSuccess($value)
	{
		$this->response['success'] = $value;
	}

	public function setMessage($value)
	{
		$this->response['message'] = $value;
	}

	public function setData($value)
	{
		$this->response['data'] = $value;
	}

	public function setDataErrors($value)
	{
		$this->response['data']['errors'] = $value;
	}

	public function clearData()
	{
		$this->response['data'] = array();
	}

	public function addData($key, $value)
	{
		$this->response['data'][$key] = $value;
	}

	public function addDataError($field, $message)
	{
		if (!isset($this->response['errors']))
		{
			$this->response['data']['errors'] = array();
		}

		$this->response['data']['errors'][] = array($field, $message);
	}

	public function __toString()
	{
		if ($this->responseType == self::RESPONSE_TYPE_JSON)
		{
			return CJSON::encode($this->response);
		}

		return 'Tipo de resposta (' . $this->responseType . ') não implementada.';
	}

	private function createResponseAsArray()
	{
		return array(
			'success' => false,
			'message' => null,
			'data'    => array(
				'errors' => array(),
			),
		);
	}

}