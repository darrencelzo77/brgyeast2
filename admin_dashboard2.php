<?php

include('dbcon.php');
function GetData($sql_query)
{
    global $db_connection;
    $result = $db_connection->query($sql_query);
    if (!$result || $result->num_rows === 0) {
        return false;
    }
    $row = $result->fetch_array(MYSQLI_NUM);
    return $row[0];
}



?>
<div class="">

    <!-- SUMMARY CARDS -->
    <div class="row mb-4">

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted">Total Residents</h6>
                    <h2 class="fw-bold text-primary"><?php echo GetData('select COUNT(*) from tbl_resident where request_status="approved" '); ?></h2>
                </div>
            </div>
        </div>

        <?php
        $clearance       = GetData('SELECT COUNT(*) FROM tbl_clearance WHERE status2="APPROVED"');
        $indigency       = GetData('SELECT COUNT(*) FROM tbl_indigency WHERE status="APPROVED"');
        $resCert         = GetData('SELECT COUNT(*) FROM tbl_rescert WHERE status="APPROVED"');
        $blotter         = GetData('SELECT COUNT(*) FROM tbl_blotter WHERE status="APPROVED"');
        $businessPermit  = GetData('SELECT COUNT(*) FROM tbl_bspermit WHERE status="APPROVED"');



        $clearance2       = GetData('SELECT COUNT(*) FROM tbl_clearance WHERE status2="PENDING"');
        $indigency2       = GetData('SELECT COUNT(*) FROM tbl_indigency WHERE status="PENDING"');
        $resCert2         = GetData('SELECT COUNT(*) FROM tbl_rescert WHERE status="PENDING"');
        $blotter2        = GetData('SELECT COUNT(*) FROM tbl_blotter WHERE status="PENDING"');
        $businessPermit2  = GetData('SELECT COUNT(*) FROM tbl_bspermit WHERE status="PENDING"');


        ?>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted">Active Requests</h6>
                    <h2 class="fw-bold text-warning"><?php echo $clearance2 + $indigency2 + $resCert2 + $blotter2 +  $businessPermit2; ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted">Completed Transactions</h6>
                    <h2 class="fw-bold text-success"><?php echo $clearance + $indigency + $resCert + $blotter +  $businessPermit; ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted">Pending Approvals</h6>
                    <h2 class="fw-bold text-danger"><?php echo GetData('select COUNT(*) from tbl_resident where request_status="pending" '); ?></h2>
                </div>
            </div>
        </div>

    </div>


    <!-- TABLE CARD -->
    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm border-0">

                <div class="card-header bg-white">
                    <h5 class="mb-0">Recent Transactions</h5>
                </div>

                <div class="card-body">

                    <style>
                        .dashboard-table-container {
                            max-height: 600px;
                            overflow-y: auto;
                        }

                        .dashboard-table-container thead th {
                            position: sticky;
                            top: 0;
                            background: #f8f9fa;
                            z-index: 2;
                        }
                    </style>

                    <div class="table-responsive dashboard-table-container">
                        <table class="table table-hover table-bordered text-center">

                            <thead>
                                <tr>
                                    <th>Resident Name</th>
                                    <th>Transaction</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $result = mysqli_query($db_connection, "SELECT CONCAT(fname,' ',lname) AS name, status2 
                                        FROM tbl_clearance WHERE status2!='DELETED'
                                        ORDER BY id_clearance DESC 
                                        LIMIT 5");

                                if ($result && mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr>
                                            <td>' . htmlspecialchars($row['name']) . '</td>
                                            <td>Barangay Clearance</td>
                                            <td>' . htmlspecialchars($row['status2']) . '</td>
                                        </tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="3" class="text-center">No transactions found.</td></tr>';
                                }
                                ?>

                                <?php
                                $result = mysqli_query($db_connection, "SELECT CONCAT(fname,' ',lname) AS name, status
                                        FROM tbl_bspermit WHERE status!='DELETED'
                                        ORDER BY id_bspermit DESC 
                                        LIMIT 5");

                                if ($result && mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr>
                                            <td>' . htmlspecialchars($row['name']) . '</td>
                                            <td>Business Permit</td>
                                            <td>' . htmlspecialchars($row['status']) . '</td>
                                        </tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="3" class="text-center">No transactions found.</td></tr>';
                                }
                                ?>

                            </tbody>

                        </table>
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>