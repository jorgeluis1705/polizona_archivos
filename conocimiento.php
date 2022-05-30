<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Polizona 37</title>
  </head>

  <body>
    <div class="container">
      <div class="container">
        <br />
        <h1>Base del conocimiento</h1>
        <br />
        <br />
      </div>
      <script type="text/javascript">
	function workToRextester()
	{
		var programa="atributo:- read(X), write('\"'), write(X), write('\":'),tipoatributo(X). tipoatributo(M):- read(X), (X='metodo'->metodo(M); b1(X)). b1(X):- X='numero'->numero; b2(X). b2(X):- X='cadena'->cadena;write('error'). cadena:- read(X), write('\"'), write(X), write('\",'). numero:-read(X), write(X). metodo(M):- write('\"function() {'),a2,write(' return '), write(M), write(';}\"'). a2:- read(X), (X='decision'->decision;a3(X)). a3(X):- X='asignacion' -> asignacion;(nl,nl,nl,write('ERROR AL INGRESAR: '),write(X),nl,nl,nl). asignacion:- read(X), write(X), write('='), read(Y), write(Y), write(';'). decision:- write('if('),condicion,write(')'), verdadero. condicion:-read(X), write(X). verdadero:- write('{'),a2,write('}'). falso:- write('{'),a2,write('}'). :- atributo.";
		var inputs = document.getElementById("inputArea").value;
		var to_compile = 
		{
	    	"LanguageChoice": "19", // 19 = prolog
			"Program": programa, //Programa descrito arriba
			"Input": inputs, //argumentos que recibirá la base del conocimiento (al momento de ejecucion).
			"CompilerArgs" : "", //Argumentos para el compilador en orden de ejecucion, en este caso no se utilizará.
			"ApiKey": "3a5bf905-e2e3-437b-a033-e70e869c1461"
		 };
		 $.ajax( 
		 {
			 url: "https://rextester.com/rundotnet/api", //URL de la web API
			 type: "POST", //petición tipo POST (Only POST)
			 data: to_compile //Objeto JSON POST armado anteriormente.
		 }).done(function(data) //si funciono, el objeto "data"
		 {
			 document.getElementById("resultSet").value = (data.Result); //añadimos al textArea el JSON que se obtuvo ubicado en 
			 //si se usa JSON.stringify(data.Result), podemos manipular el result en dado caso de que tenga funciones que pueda interpretar.
		 }).fail(function(data, err) 
		 {
		 	alert("fail " + JSON.stringify(data) + " " + JSON.stringify(err)); //ya valio malles
			document.getElementById("resultSet").value = "No jala we, revisa tus argumentos.";
		 });
	}
      </script>
      <textarea
        spellcheck="false"
        cols="1000"
        id="baseConocimiento"
        name="baseConocimiento"
        rows="12"
        class="input_box"
        style="width: 95%; display: inline-block"
        readonly
      >
objeto :- write('{'),aux1, write('}').
aux1 :- read(X),(X='atributo'->atributo;
                 X='fin'->write('')).
atributo :-read(X),write('"'),write(X),write('"'), write(':'),valorobjeto(X),aux2.

valorobjeto(M):-read(Y),(Y='cadena'->cadena;
                 Y='numero'->numero;
                 Y='objeto'->objeto;
                 Y='arreglo'->arreglo;
                 Y='metodo'->metodo(M);
                 Y='true'->verdadero;
                 Y='false'->falso).
 

aux2 :- read(X),(X='atributo'->write(','),atributo;
                 X='fin'->write('')). 
cadena :- read(X),write('"'),write(X),write('"').
numero :- read(N),write(N).
arreglo :- write('['),aux3,write(']').
aux3 :- read(X),(X='valor'->valorarreglo,aux4;
                 X='fin'->write('didid')).
aux4 :- read(X),(X='valor'->write(','),valorarreglo,aux4;
                 X='fin'->write('')). 
valorarreglo :-read(Y),(Y='cadena'->cadena;
                 Y='numero'->numero;
                 Y='objeto'->objeto;
                 Y='arreglo'->arreglo;
                 Y='true'->verdadero;
                 Y='false'->falso).
verdadero :- write('true').
falso :- write('false').
metodo(M) :- write('"function() {'),instruccion, write('return '),write(M),write('}"').
asignacion :- read(X),write(X),write('='),read(Y),write(Y),write(';').
aux5 :- read(X),(X='sinosi'->write('else '),decision;
                 X='sino'->write('else {'),instruccion,write('}');
                 X='fin'->write('')).
decision :- write('if ('),read(C),write(C),write(') {'),instruccion,write('}'),aux5.
instruccion :- read(I),(I='asignacion'->asignacion,instruccion;
                 I='decision' ->decision,instruccion;
                 I='fin'->write('')).

:- objeto.
</textarea
      >
    </div>
  </body>
</html>
