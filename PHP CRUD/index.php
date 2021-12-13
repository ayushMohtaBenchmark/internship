<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">

  <title>🔥🔥 PHP CRUD 🔥🔥</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <?php
    include 'db.php';

    $selectSQL = 'SELECT * FROM newsfeed';
    $result = mysqli_query($conn,$selectSQL);
    if ($result) {
      // $row = mysqli_fetch_assoc($result);
        // while ($row = mysqli_fetch_array($result)) {
        //     foreach($row as $data){
        //         echo $data;
        //     }
        // }
    }
?>

  <div class="container">

    <div class="page-header-extended">
      <h2 class="page-title">📰 <strong>News Feed </strong>📰</h2>
    </div>

    <div class="starter-template">

      <div class="info-table-header-block">
        <button type="button" class="btn btn-primary add-new-button" data-toggle="modal" data-target="#addnewModal">
        Add New <i class="fa fa-plus" aria-hidden="true"></i>
        </button>
      </div>


      <!-- Add module start -->
      <div class="modal fade" id="addnewModal" tabindex="-1" role="dialog" aria-labelledby="addnewModalTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="addnewModalTitle"><strong>ADD NEWS</strong> 📰👇</h4>
            </div>

            <div class="modal-body">
              <form name="myform" id="input_form" enctype="multipart/form-data" onsubmit="return validateForm()" method="post" action="insert.php">
                <div class="form-group">
                  <label for="title">Title
                    <span class="required-field">*</span>
                  </label>
                  <input type="text" class="form-control" placeholder="Enter Title" id="title" name="title" />
                </div>
                <div class="form-group">
                  <label for="description">Description
                    <span class="required-field">*</span>
                  </label>
                  <input type="text" class="form-control" placeholder="Enter Description" id="description" name="description" />
                </div>
                <div class="form-group">
                  <label for="name">Author Name
                    <span class="required-field">*</span>
                  </label>
                  <input type="place" class="form-control" placeholder="Enter Author Name" id="name" name="name" />
                </div>
                <div class="form-group">
                  <label for="email">Author Email
                    <span class="required-field">*</span>
                  </label>
                  <input type="email" class="form-control" placeholder="Enter Email" id="email" name="email" />
                </div>
                <div class="form-group">
                  <input type="file" name="photo" id="fileSelect">
                </div>
                <div class="modal-footer-extended">
                  <button class="btn btn-success">Add</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
      <!-- Add Module end -->

      <table id="student_table" class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>
              Title
            </th>
            <th>
              Description
            </th>
            <th>
              Author Name
            </th>
            <th>
              Author Email
            </th>
            <th>
              Image
            </th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php
          while($row = mysqli_fetch_array($result)) {
            echo
            "<tr>
              <td>{$row['id']}</td>
              <td>{$row['title']}</td>
              <td>{$row['description']}</td>
              <td>{$row['author_name']}</td>
              <td>{$row['author_email']}</td>
              <td><img src='uploads/{$row['image']}' height='100' width='150'></td>

              <td><button class='btn btn-sm btn-primary editButton')'><i class='fa fa-pencil' aria-hidden='true'></i></button>&nbsp;<button class='btn btn-sm btn-danger deleteButton')'><i class='fa fa-trash' aria-hidden='true'></i></button></td>
            </tr>\n";
          }
        ?>
        </tbody>
      </table>

      <div class="show-table-info hide">
        <div class="alert alert-info center">
          <strong>No Data Found, Please Enter Some Data</strong>
        </div>
      </div>
    </div>
  </div>


  <!-- User Edit Modal Start -->

  <div id="show_user_info">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalTitle"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="editModal"><strong>EDIT NEWS</strong> 📰👇</h4>
          </div>
          <div class="modal-body">
            <form action="update.php" onsubmit="return validateEditForm()" id="editForm" name="editForm" method="post">
              <input type="hidden" name='update_id' id='update_id'>
              <div class="form-group">
                <label for="edit_title">Title
                  <span class="required-field">*</span>
                </label>
                <input type="text" class="form-control" name="edit_title" placeholder="Enter Title" id="edit_title" />
              </div>
              <div class="form-group">
                <label for="edit_description">Description
                  <span class="required-field">*</span>
                </label>
                <input type="text" class="form-control" placeholder="Enter Description" id="edit_description" name="edit_description" />
              </div>
              <div class="form-group">
                <label for="edit_author_name">Author Name
                  <span class="required-field">*</span>
                </label>
                <input type="text" class="form-control" placeholder="Enter Author Name" id="edit_author_name" name="edit_author_name" />
              </div>
              <div class="form-group">
                <label for="edit_email">Author Email
                  <span class="required-field">*</span>
                </label>
                <input type="email" class="form-control" name="edit_email" placeholder="Enter Author Email" id="edit_email" />
              </div>

              <div class="form-group">
                <input type="hidden" class="form-control" id="member_id">
              </div>

              <div class="modal-footer-extended">
                <button class="btn btn-success">Update</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- User Edit Modal End -->

  <!-- Delete Confirmation Dialog Start -->
  <div id="show_user_info">
    <div class="modal fade" id="deleteDialog" tabindex="-1" role="dialog" aria-labelledby="deleteDialogTitle"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="deleteDialog">Warning!</h4>
          </div>
          <form action="delete.php" method="post">
            <div class="modal-body">
              <input type="hidden" name='delete_id' id='delete_id'>
              <h4>Delete this User Data? </h4>
              <input type="hidden" id="deleted-member-id" value="">
              <div class="modal-footer-extended">
                <button class="btn btn-danger">Delete</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Delete Confirmation Dialog End -->


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
  <script src="bootstrap.min.js"></script>
  <script src="script.js"></script>

<script> 

$(document).ready(function() {
  $('.deleteButton').on('click', function() {
    $('#deleteDialog').modal('show');

    $tr = $(this).closest('tr');

    var data = $tr.children('td').map(function() {
      return $(this).text();
    }).get();

    console.log(data);

    $('#delete_id').val(data[0]);

  });
});


$(document).ready(function() {
  $('.editButton').on('click', function() {
    $('#editModal').modal('show');

    $tr = $(this).closest('tr');

    var data = $tr.children('td').map(function() {
      return $(this).text();
    }).get();

    console.log(data);

    $('#update_id').val(data[0]);
    $('#edit_title').val(data[1]);
    $('#edit_description').val(data[2]);
    $('#edit_author_name').val(data[3]);
    $('#edit_email').val(data[4]);


  });
});

</script>

</body>

</html>