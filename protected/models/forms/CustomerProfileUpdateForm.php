<?php

class CustomerProfileUpdateForm extends CFormModel
{
	
	public $birth_date;
	public $state_id;
	public $city;
	public $neighborhood;
	public $address_complement;
	public $address_number;
	public $zipcode;
	public $gender;
	public $name;
	public $address;

	public function rules()
	{
		return array(
			array('name, birth_date', 'required'),
			array('gender, state_id', 'numerical', 'integerOnly' => true),
			array('name', 'length', 'max' => 50),
			array('city, neighborhood, address_complement, address_number, address', 'length', 'max' => 255),
			array('zipcode', 'length', 'max'=>9),
		);
	}

	public function attributeLabels()
	{
		return array(
			'name' => 'Nome completo',
			'status' => 'Status',
			'gender' => 'Sexo',
			'birth_date' => 'Nascimento',
			'state_id' => 'Estado',
			'city' => 'Cidade',
            'neighborhood' => 'Bairro',
            'address_complement' => 'Complemento',
            'address_number' => 'Número',
            'zipcode' => 'CEP',
            'address' => 'Endereço',
		);
	}
	
	public function getUpdatableFields()
	{
		return array(
			'name',
			'status',
			'gender',
			'birth_date',
			'state_id',
			'city',
            'neighborhood',
            'address_complement',
            'address_number',
            'zipcode',
            'address',
		);
	}

}
