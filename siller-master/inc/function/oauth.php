<?php
$httpClient = new \SocialConnect\Common\Http\Client\Curl();
$configureProviders = [
	'redirectUri' => 'https://siller.io/request/oauth',
	'provider' => [
		'facebook' => [
			'applicationId' => '552827418411423',
			'applicationSecret' => 'a6da147621af03a8e119eb646f334149',
			'scope' => [
				'email'
			],
			'fields' => [
				'email'
			]
		],
		'instagram' => [
			'applicationId' => '0f29c264557348c8b905751a273aecb1',
			'applicationSecret' => 'b15475d3c6684576bb0c0d6fec326ac2 ',
		],
		'github' => [
			'applicationId' => '433971bec71bc349c53f',
			'applicationSecret' => '30e633d8cf2560412f674c64c71a504f1607f038',
			'scope' => [
				'email'
			],
			'fields' => [
				'email'
			]
		],
		'twitter' => [
			'applicationId' => 'BKlNaOOEE746LqWQSK7gxQKAs',
			'applicationSecret' => 'FEYsvalNC9FGUFcx0fp06kboLI2vSBGaqSGAiAMPEIUyJ77ItO',
			'enabled' => false
		],
	]
];

$collectionFactory = null;

$service = new \SocialConnect\Auth\Service(
	$httpClient,
	new \SocialConnect\Provider\Session\Session(),
	$configureProviders,
	$collectionFactory
);
?>