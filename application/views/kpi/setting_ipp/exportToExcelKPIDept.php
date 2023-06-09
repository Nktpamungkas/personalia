<?php
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=KPI Departemen.xls");
  header("Pragma: no-cache");
  header("Expires: 0");
?>
<!-- <style> .str{ mso-character-format:\≥; } </style> -->
<meta charset="utf-8">
<table>
   <thead>
        <tr>
            <th colspan="1">Kode5</th>
            <th colspan="4">KPI Departemen - KPD</th>
            <th colspan="2" align='left'>Keterangan 1</th>
            <th colspan="1" align='left'>Target 1</th>
            </thead>
    <tbody>
    <?php
             $makar= $this->db->query("SELECT a.kode5kpd,
                                              b.kpi_dept,
                                              a.target1,
                                              a.ket1                                                             
                                        FROM 
                                              kpi_individu a
                                        LEFT JOIN (SELECT * FROM kode5kpd) b ON a.kode5kpd = b.kode5
                                            ")->result_array();
        ?>
        <?php foreach ($makar as $dMakar) : ?>
            <tr class="row30">
              <td colspan="1" ><?= $dMakar[ 'kode5kpd' ] ?></td>
              <td colspan="4" ><?= $dMakar[ 'kpi_dept' ] ?></td>
              <td colspan="2" align='left'><?= $dMakar[ 'target1' ] ?></left></td>
              <td colspan="1"align='left'><?= $dMakar[ 'ket1' ] ?></td>
            </tr>
          <?php endforeach; ?>
    </tbody>
</table>
