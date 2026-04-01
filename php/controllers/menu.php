    <?php
    require_once __DIR__.'/../models/menu_category.php';
    require_once __DIR__.'/../models/menu.php';
    Class MenuController{
        public $id;
        public $menu_name;
        public $category;
        public $price;
        public $errors;
        public function createMenu($data) {
            $this->setAttribute($data);
            $this->validate();
            if (!empty($this->errors)) {
                $this->showNewForm($this->errors, $data);
                return;
            }

            if (!Menu::create($this->menu_name, $this->category, $this->price)) {
                $this->showNewForm(["Creation failed."], $data);
                return;
            }
            
            $menus = Menu::getAll();
            $message = "Created successfully!";
            // require __DIR__ . '/../views/menu_list.php';
            render('menu_list',['menus'=>$menus,'message'=>$message]);
            }
             public function update_menu($data) {
            $this->setAttribute($data);
            $this->validate();
            if (!empty($this->errors)) {
                $this->showNewForm($this->errors, $data);
                return;
            }

            if (!Menu::update($this->menu_name, $this->category, $this->price, $this->id)) {
                $this->showNewForm(["Creation failed."], $data);
                return;
            }
            
            $menus = Menu::getAll();
            $message = "update successfully!";
            // require __DIR__ . '/../views/menu_list.php';
            render('menu_list',['menus'=>$menus,'message'=>$message]);
            }
        private function setAttribute($data){
            if (!empty($data['id'])){
                $this->id = htmlspecialchars($data['id']);
            }
            $this->menu_name = htmlspecialchars($data['menu_name'] ?? '');
            $this->category = htmlspecialchars($data['category'] ?? '');
            $this->price = htmlspecialchars($data['price'] ?? '');
        }

        private function validate() {
            if (empty($this->menu_name)) {
                $this->errors[] = "Menu Name is required.";
            } elseif (strlen($this->menu_name) > 30) {
                $this->errors[] = "Menu Name must be under 30 characters.";
            }
            if (empty($this->category)) {
                $this->errors[] = "Category is required.";
            } elseif (!is_numeric($this->category)) {
                $this->errors[] = "Category is invalid.";
            } elseif (!MenuCategory::tryfrom($this->category)) {
                $this->errors[] = "Category is invalid.";
            }
            if (empty($this->price)) {
                $this->errors[] = "Price is required.";
            } elseif (!is_numeric($this->price)) {
                $this->errors[] = "Price is invalid.";
            }
        }
        private function showNewForm($errors, $old){
            // require __DIR__ .'/../views/form_menu.php';
            render('form_menu',['errors'=>$errors,'old'=>$old]);
        }
            
    }
    ?>