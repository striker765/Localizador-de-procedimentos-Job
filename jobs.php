<?php
include("conn.php");

$jobName = $_POST['job_name'];

$sql = "SELECT * FROM jobs WHERE LOWER(job_name) LIKE LOWER(:jobName)";
$stmt = $conn->prepare($sql);
$stmt->execute(['jobName' => "%$jobName%"]);
$jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($jobs) > 0) {
    echo "<h2>Detalhes dos Jobs</h2>";
    echo "<table border='1'>";

    $class = ''; 
    foreach ($jobs as $row) {

        $class = ($class == 'even-row') ? 'odd-row' : 'even-row';

        echo "<tr class='$class'>";
        echo "<th class='job'>JOB</th><td class='job'>".$row['job_name']."</td>";
        echo "</tr><tr class='$class'>";
        echo "<th>JOB STREAM</td></th><td>".$row['job_stream']."</td>";
        echo "</tr><tr class='$class'>";
        echo "<th>WORKSTATION</td></th><td>".$row['workstation']."</td>";
        echo "</tr><tr class='$class'>";
        echo "<th>1º RESPONSÁVEL</td></th><td>".$row['first_responsible']."</td>";
        echo "</tr><tr class='$class'>";
        echo "<th>2º RESPONSÁVEL</td></th><td>".$row['second_responsible']."</td>";
        echo "</tr><tr class='$class'>";
        echo "<th>3º RESPONSÁVEL</td></th><td>".$row['third_responsible']."</td>";
        echo "</tr><tr class='$class'>";
        echo "<th>HORÁRIO DE ACIONAMENTO</td></th><td>".$row['activation_time']."</td>";
        echo "</tr><tr class='$class'>";
        echo "<th>CRITICIDADE</td></th><td>".$row['criticality']."</td>";
        echo "</tr><tr class='$class'>";
        echo "<th>DESCRIÇÃO</td></th><td>".$row['descricao']."</td>";
        echo "</tr><tr><td colspan='2'></td></tr>";
    }
    
    echo "</table>"; 
} else {
    echo "<p>Nenhum job encontrado com esse nome.</p>";
}
?>
