<?php 

    class HomeModel extends Model {
        public function index() {
            $this->query('SELECT * FROM newsfeed');
            $rows = $this->resultSet();
            return $rows;
        }

        public function add() {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                // **************** FILE UPLOAD ***************
                $file_name = $_FILES["photo"]["name"];
                $file_type = $_FILES["photo"]["type"];
                $file_size = $_FILES["photo"]["size"];
                $file_tmp_name = $_FILES["photo"]["tmp_name"];
                $file_error = $_FILES["photo"]["error"];
                $uploaddir = 'uploads/';
                $stem=substr($file_name,0,strpos($file_name,'.'));
                $extension = substr($file_name, strpos($file_name,'.'), strlen($file_name)-1);
                $uploadfile = $uploaddir . $stem.$extension;
                // ***************************************************

                $this->query('INSERT INTO newsfeed(title, description, author_name, author_email, image) VALUES(:title, :description, :author_name, :author_email, :image)');
                $this->bind(':title', $post['title']);
                $this->bind(':description', $post['description']);
                $this->bind(':author_name', $post['name']);
                $this->bind(':author_email', $post['email']);
                $this->bind(':image', $file_name);

                move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);

                $this->execute();
                // VERIFY
                if($this->lastInsertId()) {
                    header('Location: '. ROOT_URL);
                }
            }
            return;
        }

        public function delete() {

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $id = $_POST["delete_id"];
                $this->query('DELETE from newsfeed where id=:id');
                $this->bind(':id', $id);
                $this->execute();

                header('Location: '. ROOT_URL);
            }
            return;
        }

        public function update() {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($_SERVER["REQUEST_METHOD"] == "POST") {

                $this->query('UPDATE newsfeed SET title=:title, description=:description, author_name=:name, author_email=:email WHERE id=:id');
                $this->bind(':title', $post['edit_title']);
                $this->bind(':description', $post['edit_description']);
                $this->bind(':name', $post['edit_author_name']);
                $this->bind(':email', $post['edit_email']);
                $this->bind(':id', $post['update_id']);

                $this->execute();
                header('Location: '. ROOT_URL);
                // echo 'SUBMITTED';
            }
            return;
        }

    }

?>