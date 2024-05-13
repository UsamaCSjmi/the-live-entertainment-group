<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');
 ?>
<?php 
class Subcategory
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function subcatInsert($subcatName,$catId)
    {
        $subcatName = $this->fm->validation($subcatName);
        $subcatName = mysqli_real_escape_string($this->db->link, $subcatName);
        $slug = $this->fm->slugify($subcatName);
        $catId = $this->fm->validation($catId);
        $catId = mysqli_real_escape_string($this->db->link, $catId);
        if (empty($subcatName)) {
            $msg = "<span class='error'>Category field must not be empty!</span>";
            return $msg;
        } else {
            $query = "INSERT INTO subcategory(category,name,slug) VALUES($catId,'$subcatName',$slug)";
            $catinsert = $this->db->insert($query);
            if ($catinsert) {
                $msg = "<span class='success'>Sub Category Inserted Successfully</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Sub Category Not Inserted.</span>";
                return $msg;
            }
        }
    }

    public function getAllActiveSubcategories()
    {
        $query = "SELECT * FROM subcategory WHERE is_active='1' ORDER BY id ASC";
        $result = $this->db->select($query);
        return $result;
    }

    public function getSubcatById($id)
    {
        $query = "SELECT * FROM subcategory WHERE id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function getSubcatByCatId($catid)
    {
        $query = "SELECT * FROM subcategory WHERE category = $catid AND is_active='1'";
        $result = $this->db->select($query);
        return $result;
    }

    public function getSubcatBySlugAndCatId($slug,$catId)
    {
        $query = "SELECT * FROM subcategory WHERE slug = '$slug' AND category = $catId AND is_active='1'";
        $result = $this->db->select($query);
        return $result;
    }

    public function subcatUpdate($catName, $catid)
    {
        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName);
        $catid = mysqli_real_escape_string($this->db->link, $catid);
        if (empty($catName)) {
            $msg = "<span class='error'>Category field must not be empty!</span>";
            return $msg;
        } else {
            $query = "UPDATE sub_categories
        	SET
        	sub_categories = '$catName'
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
    public function delSubCatById($id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "DELETE FROM subcategory WHERE id = '$id'";
        $deldata = $this->db->delete($query);
        if ($deldata) {
            $msg = "<span class='success'>Sub Category Deleted Successfully</span>";
            return $msg;
        } else {
            $msg = "<span class='error'Sub Category Not Deleted!</span>";
            return $msg;
        }
    }
}
