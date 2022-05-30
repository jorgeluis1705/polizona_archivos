<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://rextester.com/rundotnet/api",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_HTTPHEADER => [
		"LanguageChoice: 19",
		"Program: atributo:- read(X), write('\"'), write(X), write('\":'),tipoatributo(X). tipoatributo(M):- read(X), (X='metodo'->metodo(M); b1(X)). b1(X):- X='numero'->numero; b2(X). b2(X):- X='cadena'->cadena;write('error'). cadena:- read(X), write('\"'), write(X), write('\",'). numero:-read(X), write(X). metodo(M):- write('\"function() {'),a2,write(' return '), write(M), write(';}\"'). a2:- read(X), (X='decision'->decision;a3(X)). a3(X):- X='asignacion' -> asignacion;(nl,nl,nl,write('ERROR AL INGRESAR: '),write(X),nl,nl,nl). asignacion:- read(X), write(X), write('='), read(Y), write(Y), write(';'). decision:- write('if('),condicion,write(')'), verdadero. condicion:-read(X), write(X). verdadero:- write('{'),a2,write('}'). falso:- write('{'),a2,write('}'). :- atributo.",
        "Input: isan. metodo.  decision. precio<350000. asignacion. isan. precio*0.02. fin.",
		"CompilerArgs : ", //Argumentos para el compilador en orden de ejecucion, en este caso no se utilizará.
		"ApiKey: 3a5bf905-e2e3-437b-a033-e70e869c1461"
	],
]);

$response = curl_exec($curl);
echo $response;
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}