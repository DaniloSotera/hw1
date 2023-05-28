<?php
    // Effettuazione di una query al database per recuperare le informazioni da visualizzare
    $data = json_decode(file_get_contents('php://input'), true);
    $conn = mysqli_connect('localhost','root','','troina');
  
    $query = "SELECT id,titolo,data_inizio,data_fine,path,paragrafo FROM info WHERE id = '".$data['id_festa']."'";
    $result = mysqli_query($conn, $query);
    // Conversione dei dati in un array di dati PHP
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
   }

  // Codifica dell'array di dati come JSON
    echo json_encode($data);
    mysqli_close($conn);
  ?>