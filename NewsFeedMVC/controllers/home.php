<?php 

    class Home extends Controller {
        protected function index() {
            $viewmodel = new HomeModel();
            $this->returnView($viewmodel->index(), true);
        }

        protected function add() {
            $viewmodel = new HomeModel();
            $this->returnView($viewmodel->add(), true);
        }

        protected function delete() {
            $viewmodel = new HomeModel();
            $this->returnView($viewmodel->delete(), true);
        }

        protected function update() {
            $viewmodel = new HomeModel();
            $this->returnView($viewmodel->update(), true);
        }
    }

?>