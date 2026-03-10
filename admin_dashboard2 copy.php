<?php

include('dbcon.php');


?>
<div class="">

    <!-- SUMMARY CARDS -->
    <div class="row mb-4">

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted">Total Residents</h6>
                    <h2 class="fw-bold text-primary">1,245</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted">Active Requests</h6>
                    <h2 class="fw-bold text-warning">32</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted">Completed Transactions</h6>
                    <h2 class="fw-bold text-success">890</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted">Pending Approvals</h6>
                    <h2 class="fw-bold text-danger">12</h2>
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
                            max-height: 350px;
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
                                    <th>ID</th>
                                    <th>Resident Name</th>
                                    <th>Transaction</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>001</td>
                                    <td>Juan Dela Cruz</td>
                                    <td>Barangay Clearance</td>
                                    <td>Mar 08, 2026</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>

                                <tr>
                                    <td>002</td>
                                    <td>Maria Santos</td>
                                    <td>Certificate of Residency</td>
                                    <td>Mar 07, 2026</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </tr>

                                <tr>
                                    <td>003</td>
                                    <td>Pedro Reyes</td>
                                    <td>Business Permit</td>
                                    <td>Mar 06, 2026</td>
                                    <td><span class="badge bg-primary">Processing</span></td>
                                </tr>

                                <tr>
                                    <td>004</td>
                                    <td>Ana Lopez</td>
                                    <td>Barangay ID</td>
                                    <td>Mar 05, 2026</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>

                                <tr>
                                    <td>005</td>
                                    <td>Jose Ramos</td>
                                    <td>Indigency Certificate</td>
                                    <td>Mar 04, 2026</td>
                                    <td><span class="badge bg-danger">Rejected</span></td>
                                </tr>

                            </tbody>

                        </table>
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>