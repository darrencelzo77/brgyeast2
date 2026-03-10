<td>
    <?php
    $status = $view['status2'];

    if ($status == 'PENDING') {
        echo '<span class="badge bg-warning text-dark">PENDING</span>';
    } elseif ($status == 'APPROVED') {
        echo '<span class="badge bg-success">APPROVED</span>';
    } elseif ($status == 'REJECTED') {
        echo '<span class="badge bg-danger">REJECTED</span>';
    } elseif ($status == 'READY FOR PICKUP') {
        echo '<span class="badge bg-primary">READY FOR PICKUP</span>';
    } elseif ($status == 'CLAIMED') {
        echo '<span class="badge bg-secondary">CLAIMED</span>';
    } elseif ($status == 'DELETED') {
        echo '<span class="badge bg-secondary">DELETED</span>';
    }
    ?>
</td>