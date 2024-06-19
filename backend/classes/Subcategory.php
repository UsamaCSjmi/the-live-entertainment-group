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

    public function subcatInsert($subcatName,$subcatSlug,$catId,$title,$description,$content)
    {
        $subcatName = $this->fm->validation($subcatName);
        $subcatName = mysqli_real_escape_string($this->db->link, $subcatName);
        $catId = $this->fm->validation($catId);
        $catId = mysqli_real_escape_string($this->db->link, $catId);
        $subcatSlug = $this->fm->validation($subcatSlug);
        $subcatSlug = mysqli_real_escape_string($this->db->link, $subcatSlug);
        $title = $this->fm->validation($title);
        $title = mysqli_real_escape_string($this->db->link, $title);
        $description = $this->fm->validation($description);
        $description = mysqli_real_escape_string($this->db->link, $description);
        $content = $this->fm->validation($content);
        $content = mysqli_real_escape_string($this->db->link, $content);
        if($subcatSlug==""){
            $slug = $this->fm->slugify($subcatName);
        }
        else{
            $slug = $subcatSlug;
        }
        if (empty($subcatName)) {
            $msg = "Sub-Category Name field must not be empty!";
            return $msg;
        } else {
            try{
                $query = "INSERT INTO subcategory(category,name,slug,title,description,content) VALUES($catId,'$subcatName','$slug','$title','$description','$content')";
                $catinsert = $this->db->insert($query);
                if ($catinsert) {
                    $msg = true;
                    return $msg;
                } else {
                    $msg = "Sub Category Not Inserted.";
                    return $msg;
                }
            }
            catch(Exception $e){
                $msg = "Try Different Sub-Category Name or Slug";
                return $msg;
            }
        }
    }

    public function getAllSubcategories()
    {
        $query = "SELECT * FROM subcategory ORDER BY name ASC";
        $result = $this->db->select($query);
        return $result;
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
        return mysqli_fetch_array($result);
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

    public function subcatUpdate($subcatName, $subcatid,$subcatSlug,$catId,$title,$description,$content)
    {
        $subcatid = $this->fm->validation($subcatid);
        $subcatid = mysqli_real_escape_string($this->db->link, $subcatid);
        $subcatName = $this->fm->validation($subcatName);
        $subcatName = mysqli_real_escape_string($this->db->link, $subcatName);
        $catId = $this->fm->validation($catId);
        $catId = mysqli_real_escape_string($this->db->link, $catId);
        $subcatSlug = $this->fm->validation($subcatSlug);
        $subcatSlug = mysqli_real_escape_string($this->db->link, $subcatSlug);
        $title = $this->fm->validation($title);
        $title = mysqli_real_escape_string($this->db->link, $title);
        $description = $this->fm->validation($description);
        $description = mysqli_real_escape_string($this->db->link, $description);
        $content = $this->fm->validation($content);
        $content = mysqli_real_escape_string($this->db->link, $content);
        if($subcatSlug==""){
            $slug = $this->fm->slugify($subcatName);
        }
        else{
            $slug = $subcatSlug;
        }
        if (empty($subcatName)) {
            $msg = "Category field must not be empty!";
            return $msg;
        } else {
            try{
                $query = "UPDATE subcategory
                SET
                name = '$subcatName',
                slug = '$slug',
                category = $catId,
                title='$title',
                description='$description',
                content='$content'
                WHERE id = $subcatid";
                $updated_row = $this->db->update($query);
                if ($updated_row) {
                    $msg = true;
                    return $msg;
                } else {
                    $msg = "Category Not Updated.";
                    return $msg;
                }
            }
            catch(Exception $e){
                $msg = "Try Different Sub-Category Name or Slug";
                return $msg;
            }
        }
    }

    public function updateStatus($subcatId, $is_active){
        $subcatId = $this->fm->validation($subcatId);
        $subcatId = mysqli_real_escape_string($this->db->link, $subcatId);
        $is_active = $this->fm->validation($is_active);
        $is_active = mysqli_real_escape_string($this->db->link, $is_active);
        if (empty($subcatId)) {
            $msg = "Sub-Category ID field must not be empty!";
            return $msg;
        } else {
            $query = "UPDATE subcategory
        	SET
        	is_active = '$is_active'
        	WHERE id = '$subcatId'";
            $updated_row = $this->db->update($query);
            if ($updated_row) {
                $msg = true;
                return $msg;
            } else {
                $msg = "Status Update failed.";
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
            $msg = true;
            return $msg;
        } else {
            $msg = "Sub Category Not Deleted!";
            return $msg;
        }
    }
}
