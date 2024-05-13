<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');
 ?>
<?php 
class Category
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    
    public function catInsert($catName)
    {
        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName);
        $slug = $this->fm->slugify($catName);
        if (empty($catName)) {
            $msg = "<span class='error'>Category field must not be empty!</span>";
            return $msg;
        } else {
            $query = "INSERT INTO category(name,slug) VALUES('$catName','$slug')";
            $catinsert = $this->db->insert($query);
            if ($catinsert) {
                $msg = "<span class='success'>Category Inserted Successfully</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Category Not Inserted.</span>";
                return $msg;
            }
        }
    }

    public function getAllActiveCategories()
    {
        $query = "SELECT * FROM category WHERE is_active='1' ORDER BY id ASC";
        $result = $this->db->select($query);
        return $result;
    }


    public function getCategoryById($catid)
    {
        $query = "SELECT * FROM category WHERE id = '$catid'";
        $result = $this->db->select($query);
        return $result;
    }

    public function getCategoryBySlug($slug)
    {
        $query = "SELECT * FROM category WHERE slug = '$slug' AND is_active = '1'";
        $result = $this->db->select($query);
        return $result;
    }

    public function categoryUpdate($catName, $catid)
    {
        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName);
        $catid = mysqli_real_escape_string($this->db->link, $catid);
        if (empty($catName)) {
            $msg = "<span class='error'>Category field must not be empty!</span>";
            return $msg;
        } else {
            $query = "UPDATE category
        	SET
        	name = '$catName'
        	WHERE id = '$catid'";
            $updated_row = $this->db->update($query);
            if ($updated_row) {
                $msg = "<span class='success'>Category Updated Successfully</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Category Not Updated.</span>";
                return $msg;
            }
        }
    }
    public function delCatById($id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "DELETE FROM category WHERE id = '$id'";
        $deldata = $this->db->delete($query);
        if ($deldata) {
            $msg = "<span class='success'>Category Deleted Successfully</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Category Not Deleted!</span>";
            return $msg;
        }
    }
}
