<?php
include('../conecta/prolog.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <title>Conecta Prolog</title>
  </head>
  <body>
    <header class="bg-azul-deg">
      <h1>Peña real Jorge LuisConecta Prolog</h1>
    </header>

    <div class="container">
      <form method="POST" action="newProlog.php">
        <fieldset class="pago">
          <legend class="titulo titulo-lima">Argumentos</legend>
          <div class="d-flex flex-column">
            <label for="programa" id="programa"
            class="text text-info">
              Escribe la base de conocimiento:</label
            >
            <textarea
              name="programa"
              cols="30"
              rows="10"
              class="form-control"
              id="programa"
            >
            objeto :- write('{'),aux1, write('}').
    aux1 :- read(X),(X='atributo'->atributo;
                     X='fin'->write('')).
    atributo :-read(X),write('\"'),write(X),write('\"'), write(':'),valorobjeto(X),aux2.
    
    valorobjeto(M):-read(Y),(Y='cadena'->cadena;
                     Y='numero'->numero;
                     Y='objeto'->objeto;
                     Y='arreglo'->arreglo;
                     Y='metodo'->metodo(M);
                     Y='true'->verdadero;
                     Y='false'->falso).
     
    
    aux2 :- read(X),(X='atributo'->write(','),atributo;
                     X='fin'->write('')). 
    cadena :- read(X),write('\"'),write(X),write('\"').
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
            
            </textarea>
          </div>
          <div class="d-flex flex-column">
            <label for="inputArea" class="text text-info">Escibir argumentos:</label>
            <textarea
              name="inputArea"
              id="inputArea"
              cols="30"
              rows="10"
              class="form-control"
            >
          atributo. empresa. objeto. atributo. nbempresa. cadena. 43. atributo. balance. objeto. atributo. activo. objeto. atributo. infraestructura. numero. 0. atributo. bancos. numero. 0. atributo. insumoA. cadena. Math.random()*100. atributo. insumoB. cadena. sumar_el_atributo_cantidad_de_los_embarques_del_almacenB. atributo. enproceso. numero. 0. atributo. mercancias. numero. 0. atributo. clientes. numero. 0. fin. atributo. pasivo. objeto. fin. atributo. capital. objeto. atributo. capitalsocial. numero. 0. atributo. utilidades. numero. 0. fin. fin. atributo. almacenA. objeto.  atributo. maxA. numero. 5000.  atributo. totalA. cadena. sumatoria_de_cantidad.  atributo. unitarioA. cadena. sumatoria_de_precio_entre_sumatoria_de_cantidad.  atributo. inventario. arreglo.  valor. objeto. atributo. embarque. objeto. atributo. cantidad. numero. 209. atributo. precio. numero. 2159.52. fin. fin. valor. objeto. atributo. embarque. objeto. atributo. cantidad. numero. 263. atributo. precio. numero. 2070.24. fin. fin. valor. objeto. atributo. embarque. objeto. atributo. cantidad. numero. 236. atributo. precio. numero. 2069.19. fin. fin. fin. fin.  atributo. almacenB. objeto.  atributo. maxB. numero. 5000.  atributo. totalB. cadena. sumatoria_de_cantidad.  atributo. unitarioB. cadena. sumatoria_de_precio_entre_sumatoria_de_cantidad.  atributo. inventario. arreglo.  valor. objeto. atributo. embarque. objeto. atributo. cantidad. numero. 117. atributo. precio. numero. 2175.66. fin. fin. valor. objeto. atributo. embarque. objeto. atributo. cantidad. numero. 172. atributo. precio. numero. 2227.33. fin. fin. fin. fin. fin. fin. 
          </textarea
            >
          </div>
          <div class="d-flex flex-column">
            <label for="resultSet" class="text text-info">Resultado:</label>
            <textarea cols="1000" 
            class="form-control"
            id="resultSet" name="resultSet" readonly>
   <?php 
          if(isset($inputs)){
              echo $response->Result;
          }
          ?></textarea
            >
            <input class="btn btn-danger" type="submit" value="Enviar" />
          </div>
        </fieldset>
      </form>
    </div>
  </body>
</html>
