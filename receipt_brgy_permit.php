<?php
require('classes/conn.php');

if (!isset($_GET['id'])) {
    die("No receipt ID.");
}

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM tbl_bspermit WHERE id_bspermit = ?");
$stmt->execute([$id]);
$resident = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$resident) {
    die("Record not found.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Business Permit Receipt</title>

    <style>
        @media print {
            * {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f4f6f9;
            padding: 30px;
        }

        .receipt {
            max-width: 650px;
            margin: auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .receipt-header {
            background: #07325f;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .receipt-header h2 {
            margin: 0;
            font-size: 22px;
            letter-spacing: 1px;
        }

        .receipt-body {
            padding: 25px;
        }

        .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .label {
            font-weight: 600;
            color: #07325f;
            width: 35%;
        }

        .value {
            width: 60%;
            text-align: right;
            font-weight: 500;
        }

        .divider {
            border-top: 1px dashed #07325f;
            margin: 20px 0;
        }

        .footer {
            text-align: center;
            font-size: 13px;
            color: #555;
        }

        .control-no {
            font-size: 16px;
            font-weight: bold;
            color: #07325f;
        }

        @media print {
            body {
                background: #fff;
                padding: 0;
            }

            .receipt {
                box-shadow: none;
                border-radius: 0;
            }
        }
    </style>
</head>

<body onload="window.print()">

    <div class="receipt">

        <div class="receipt-header">
            <h2>Business Permit Receipt</h2>
        </div>

        <div class="receipt-body">

            <div class="row">
                <div class="label">Transaction No</div>
                <div class="value control-no">
                    <?= htmlspecialchars($resident['control_no']) ?>
                </div>
            </div>

            <div class="row">
                <div class="label">Full Name</div>
                <div class="value">
                    <?= strtoupper(htmlspecialchars($resident['fname'] . ' ' . $resident['mi'] . ' ' . $resident['lname'])) ?>
                </div>
            </div>

            <div class="row">
                <div class="label">Address</div>
                <div class="value">
                    <?= htmlspecialchars($resident['street'] . ', ' . $resident['brgy'] . ', ' . $resident['municipal']) ?>
                </div>
            </div>


            <div class="row">
                <div class="label">Date Issued</div>
                <div class="value">
                    <?= date('F d, Y') ?>
                </div>
            </div>

            <div class="divider"></div>

            <!-- Add this inside .receipt-body, for example below the Control No row -->
            <div class="row" style="justify-content: center; margin-top: 20px;">
                <!-- <div class="label" style="width: auto;">QR Code</div> -->
                <div class="value" style="width: auto; text-align: center;">
                    <?php if (!empty($resident['qr_code']) && file_exists($resident['qr_code'])): ?>
                        <img src="<?= htmlspecialchars($resident['qr_code']) ?>" alt="QR Code" style="width:150px; height:150px;">
                    <?php else: ?>
                        <span style="color:red;">QR code not available</span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="footer">
                This document serves as an official proof of barangay registration.<br>

                <br><br>
                <strong style="color:#07325f;">Barangay Office</strong>
            </div>


            <br><br>
            <h4><i> <b>Please take a screenshot of this or save it as a PDF on your mobile device.</b></i></h4>
        </div>
    </div>

</body>

</html>