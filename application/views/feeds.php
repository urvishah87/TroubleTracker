<div class="container top">

    <ul class="breadcrumb">
        <li>
            <a href="<?php echo site_url("feeds").""; ?>">
                <?php echo ucfirst($this->uri->segment(1)); ?>
            </a> 
            <span class="divider">/</span>
        </li>
        <li class="active">
            <?php echo ucfirst($this->uri->segment(2)); ?>
        </li>
    </ul>

    <div class="page-header users-header">
        <h2>
            <?php echo ucfirst($this->uri->segment(2)); ?> 
            <a  href="<?php echo site_url("trouble_tracker") . '/' . $this->uri->segment(2); ?>addFeed" class="btn btn-success">Add a new</a>
        </h2>
    </div>

    <div class="row">
        <div class="span12 columns">
 
            <table class="table table-striped table-bordered table-condensed">
                <thead>
                    <tr>
                        <th class="header">Category</th>
                        <th class="yellow header headerSortDown">Address</th>
                        <th class="yellow header headerSortDown">Comments</th>
                        <th class="yellow header headerSortDown">Status</th>
                        <th class="header">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($feeds as $row) {
                        $status = "Open";
                        switch ($row['tt_publishstatus']) {
                            case 2:
                                $status = "In Progress";
                                break;
                            case 3:
                                $status = "Compelete";
                                break;
                            case 4:
                                $status = "Reject";
                                break;
                            default:
                                $status = "Open";
                                break;
                        }

                        echo '<tr>';
                        echo '<td>' . $row['category'] . '</td>';
                        echo '<td>' . $row['tt_address'] . '</td>';
                        echo '<td>' . $row['tt_comments'] . '</td>';
                        echo '<td>' . $status . '</td>';
                        echo '<td class="crud-actions">
                  <a href="' . site_url("admin") . '/manufacturers/update/' . $row['tt_feed_id'] . '" class="btn btn-info">view & edit</a>  
                  <a href="' . site_url("admin") . '/manufacturers/delete/' . $row['tt_feed_id'] . '" class="btn btn-danger">delete</a>
                </td>';
                        echo '</tr>';
                    }
                    ?>      
                </tbody>
            </table>

<?php echo '<div class="pagination">' . $this->pagination->create_links() . '</div>'; ?>
