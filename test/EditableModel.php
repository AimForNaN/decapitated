<?php

	header('Content-Type: application/json');

	require_once './vendor/autoload.php';
	use Decapitated\Model\Editable as Model;

	$model = new Model([
		'Hello' => [
			'World' => 'World',
		],
	]);

	assert($model->Hello->World == 'World');
	assert($model['Hello/World'] == 'World');

	assert($model->Nope == null);
	assert($model['Nope'] == null);

	$model->Yup = 'yup';
	assert($model->Yup == 'yup');

	$model->Hello->User = 'User';
	assert($model->Hello->User == 'User');

	$model['Yup'] = 'yupyup';
	assert($model['Yup'] == 'yupyup');

	$model['Hello/User'] = 'UserUser';
	assert($model['Hello/User'] == 'UserUser');

	assert($model->Hello instanceof Model);
	assert($model['Hello'] instanceof Model);

	foreach ($model->Hello as $item) {
	}

	echo "Success";
