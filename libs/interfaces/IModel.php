<?php

    interface IModel {
        public function save();
        public function getAll();
        public function get($data);
        public function delete($data);
        public function update();
        public function from($array);
    }

?>