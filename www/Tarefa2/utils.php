<?php
    $tarefas = [
        [
            "id" => 1,
            "descripcion" => "Tarefa1 con espazos",
            "estado" => "Pendente de realizar "
        ],
        [
            "id" => 2,
            "descripcion" => "Tarefa2 con car@cteres especiais e espazos",
            "estado" => "En proceso por re@lizar`"
        ],
        [
            "id" => 3,
            "descripcion" => "Tarefa3 con espazos e caracteres especi```ais º",
            "estado" => "Completada @ t@refa``"
        ]
    ];

    function filtrarContido($texto) {
        $texto = preg_replace("/[^a-zA-Z0-9\s]/", "", $texto); 
        $texto = preg_replace('/\s+/', ' ', $texto);           
        return trim($texto);                               
    }

    function comprobarInformacion($texto) {
        $informacionComprobada = filtrarContido($texto);

        if (empty($informacionComprobada)) {
            return false;
        }

        if (strlen($informacionComprobada) < 3) {
            return false;
        }

        return true;
    }

    function gardarTarefa(&$tarefas, $id, $descripcion, $estado) {
        $descripcionFiltrada = filtrarContido($descripcion);
        $estadoFiltrado = filtrarContido($estado);

        if (!comprobarInformacion($descripcionFiltrada) || !comprobarInformacion($estadoFiltrado)) {
            return false;
        }

        $novaTarefa = [
            "id" => $id,
            "descripcion" => $descripcionFiltrada,
            "estado" => $estadoFiltrado
        ];

        array_push($tarefas, $novaTarefa);

        return true;
    }

    $resultado = gardarTarefa($tarefas, 4, "Tarefa4 con   espazos", "Pendiente de     realizar ");

    if ($resultado) {
        echo "A tarefa gardouse correctamente.<br>";
    } else {
        echo "Error: non se puido gardar a tarefa, os datos non son válidos.<br>";
    }

    function devolverTarefas($tarefas) {
        foreach ($tarefas as $tarefa) {

            $descripcionFiltrada = filtrarContido($tarefa["descripcion"]);
            $estadoFiltrado = filtrarContido($tarefa["estado"]);

            echo "ID: " . $tarefa["id"] . "<br>";
            echo "Descripción: " . $descripcionFiltrada . "<br>";
            echo "Estado: " . $estadoFiltrado . "<br><br>";
        }
    }

    devolverTarefas($tarefas);
?>
