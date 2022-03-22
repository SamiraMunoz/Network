<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Pruebas del proyecto grafo</h1>

  <?php
    include("network.php");

    $network = new Network();

    $network -> addVertex(new Vertex("A"));
    $network -> addVertex(new Vertex("B"));
    $network -> addVertex(new Vertex("C"));
    $network -> addVertex(new Vertex("D"));
    $network -> addVertex(new Vertex("H"));

    $network -> addEdge("A", "B", 3);
    $network -> addEdge("A", "C", 5);
    $network -> addEdge("C", "D", 10);
    $network -> addEdge("D", "A", 3);
    $network -> addEdge("B", "H", 9);

    echo "<b>Matriz Adyacencia:</b><br>";
    print_r($network -> getMatrix());
    echo "<hr>";

    echo "<b>Vector Vertices:</b><br>";
    print_r($network -> getArray());
    echo "<hr>";

    echo "<div id='grafo1'> </div>"

    echo "<b>Recorrido Matriz Adyacencia:</b><br>";
    foreach ($network -> getMatrix() as $indexMatrix => $array) {
      echo "<br>". $indexMatrix ." ->";
      if($array != null){
        foreach ($array as $arrayIndex => $weight){
          echo " | ".$arrayIndex." | ".$weight." | -- ";
        }
      }
    }
    echo "<hr>";

    echo "<b>GetVertice A:</b><br>";
    print_r($network -> getVertex("A"));
    echo "<hr>";

    echo "<b>Adyacentes de A:</b><br>";
    print_r($network -> getAdjacent("A"));
    echo "<hr>";

    echo "<b>Grado de A:</b><br>";
    print_r($network -> degrees("A"));
    echo "<hr>";

    echo "<b>Eliminar Arista A - C:</b><br>";
    if($network -> deleteEdge("A", "C")){
      echo "Arista eliminada";
    }else{
      echo "Arista no existente";
    }
    echo "<hr>";

    echo "<b>Recorrido Matriz Adyacencia:</b><br>";
    foreach ($network -> getMatrix() as $indexMatrix => $array) {
      echo "<br>". $indexMatrix ." ->";
      if($array != null){
        foreach ($array as $arrayIndex => $weight){
          echo " | ".$arrayIndex." | ".$weight." | -- ";
        }
      }
    }
    echo "<hr>";

    echo "<b>Eliminar Vertice B:</b><br>";
    if($network -> deleteVertex("B")){
      echo "Verice eliminado.";
    }else{
      echo "Verice no existente.";
    }
    echo "<hr>";

    echo "<b>Recorrido Matriz Adyacencia:</b><br>";
    foreach ($network -> getMatrix() as $indexMatrix => $array) {
      echo "<br>". $indexMatrix ." ->";
      if($array != null){
        foreach ($array as $arrayIndex => $weight){
          echo " | ".$arrayIndex." | ".$weight." | -- ";
        }
      }
    }
    echo "<hr>";
  ?>

  <script type="text/javascript">
    var nodos = new vis.DataSet([
      <?php
        foreach ($network -> getMatrix() as $indexMatrix => $array) {
          echo "{id: " . $indexMatrix . ", label: " . $indexMatrix . "}";
        }
      ?>
    ]);

    var aristas = new vis.DataSet([
      <?php
        foreach ($network -> getMatrix() as $indexMatrix => $array) {
          if($array != null){
            foreach ($array as $arrayIndex => $weight){
              echo "{from: " . $indexMatrix . ", to: " . $arrayIndex . "label: " . $weight . "}";
            }
          }
        }
      ?>
    ]);

    var contenedor = document.getElementById("grafo1");

    var datos = {
      nodes: nodos,
      edges: aristas
    };

    var options = {
      edges: {
        arrows: {
          to: {
            enabled: true
          }
        }
      }
    };

    var grafo = new vis.Network(contenedor, datos, options);
  </script>
</body>
</html>
