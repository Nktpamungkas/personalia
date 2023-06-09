<?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=Kode5 KPD.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
?>
<table>
    <thead>
        <tr>
            <th>Kode</th>
            <th>KPI Dept</th>
            <th>Target</th>
            <th>Departement</th>
            <th>Keterangan KPD</th>
            <th>STN</th>
            <th>KPC</th>
            <th>STO</th>
            <th>BSC</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $data = $this->db->query("SELECT id, kode5, kpi_dept, `target`, dept, ket_kpd, kode4stn, kode3kpc, kode2sto, kode1bsc FROM kode5kpd ORDER BY id ASC")->result_array(); 
        ?>
        <?php foreach($data AS $result): ?>
        <tr>
            <td><?= $result['kode5']; ?></td>
            <td><?= $result['kpi_dept']; ?></td>
            <td><?= $result['target']; ?></td>
            <td><?= $result['dept']; ?></td>
            <td><?= $result['ket_kpd']; ?></td>
            <td><?= $result['kode4stn']; ?></td>
            <td><?= $result['kode3kpc']; ?></td>
            <td><?= $result['kode2sto']; ?></td>
            <td><?= $result['kode1bsc']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>