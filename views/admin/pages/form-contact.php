<?php  require_once('../../../controllers/contact.controller.php');
$contactController = new ContactController();
$contacts = $contactController->getAllContact();
?>
<?php include '../components/middleware.php'; ?>
<?php include '../components/sidebar.php'; ?>
<?php include '../components/header.php'; ?>

<div class="container-fluid">
<div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Title</th>
                            <th>Message</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          foreach ($contacts as $contact) {
                            echo "<tr>";
                            echo "<td>" .  $contact['id'] . "</td>";
                            echo "<td>" .  $contact['full_name'] . "</td>";
                            echo "<td>" .  $contact['email'] . "</td>";
                            echo "<td>" .  $contact['title'] . "</td>";
                            echo "<td>" .  $contact['content'] . "</td>";
                            echo "<td><a href='../../../delete-contact?id=" . $contact['id'] . "'>Delete</a></td>";
                            echo "</tr>";
                          }
                         ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include '../components/footer.php'; ?>