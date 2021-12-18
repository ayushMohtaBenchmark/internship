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
  <link rel="stylesheet" href="http://localhost:8012/NewsFeedMVC/assets/css/style.css">
</head>

<body>
  
<?php require($view); ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
  <script src="http://localhost:8012/NewsFeedMVC/assets/js/bootstrap.min.js"></script>
  <script src="http://localhost:8012/NewsFeedMVC/assets/js/script.js"></script>

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