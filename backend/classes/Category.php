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
    
    public function catInsert($catName,$catSlug,$title,$description,$content)
    {
        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName);
        $catSlug = $this->fm->validation($catSlug);
        $catSlug = mysqli_real_escape_string($this->db->link, $catSlug);
        $title = $this->fm->validation($title);
        $title = mysqli_real_escape_string($this->db->link, $title);
        $description = $this->fm->validation($description);
        $description = mysqli_real_escape_string($this->db->link, $description);
        $content = $this->fm->validation($content);
        $content = mysqli_real_escape_string($this->db->link, $content);
        if($catSlug==""){
            $slug = $this->fm->slugify($catName);
        }
        else{
            $slug = $catSlug;
        }
        if (empty($catName)) {
            $msg = "Category Name field must not be empty!";
            return $msg;
        } else {
            try{
                $query = "INSERT INTO category(name,slug,title,description,content) VALUES('$catName','$slug','$title','$description','$content')";
                $catinsert = $this->db->insert($query);
                if ($catinsert) {
                    $msg = true;
                    return $msg;
                } else {
                    $msg = "Category Not Inserted";
                    return $msg;
                }
            }
            catch(Exception $e){
                $msg = "Try Different Category Name or Slug";
                return $msg;
            }
        }
    }

    public function updateStatus($catId, $is_active){
        $catId = $this->fm->validation($catId);
        $catId = mysqli_real_escape_string($this->db->link, $catId);
        $is_active = $this->fm->validation($is_active);
        $is_active = mysqli_real_escape_string($this->db->link, $is_active);
        if (empty($catId)) {
            $msg = "Category ID field must not be empty!";
            return $msg;
        } else {
            $query = "UPDATE category
        	SET
        	is_active = '$is_active'
        	WHERE id = '$catId'";
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

    public function getAllCategories()
    {
        $query = "SELECT * FROM category ORDER BY 'name' ASC";
        $result = $this->db->select($query);
        return $result;
    }

    public function getAllActiveCategories()
    {
        $query = "SELECT * FROM category WHERE is_active='1' ORDER BY id ASC";
        $result = $this->db->select($query);
        return $result;
    }


    public function getCategoryById($catid)
    {
        $catid = $this->fm->validation($catid);
        $catid = mysqli_real_escape_string($this->db->link, $catid);
        $query = "SELECT * FROM category WHERE id = '$catid'";
        $result = $this->db->select($query);
        if($result){
            return mysqli_fetch_array($result);
        }
        else{
            return false;
        }
    }

    public function getCategoryBySlug($slug)
    {
        $query = "SELECT * FROM category WHERE slug = '$slug' AND is_active = '1'";
        $result = $this->db->select($query);
        return $result;
    }

    public function categoryUpdate($catName, $catSlug, $catid,$title,$description,$content)
    {
        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName);
        $catid = $this->fm->validation($catid);
        $catid = mysqli_real_escape_string($this->db->link, $catid);
        $catSlug = $this->fm->validation($catSlug);
        $catSlug = mysqli_real_escape_string($this->db->link, $catSlug);
        $title = $this->fm->validation($title);
        $title = mysqli_real_escape_string($this->db->link, $title);
        $description = $this->fm->validation($description);
        $description = mysqli_real_escape_string($this->db->link, $description);
        $content = $this->fm->validation($content);
        $content = mysqli_real_escape_string($this->db->link, $content);
        if($catSlug==""){
            $slug = $this->fm->slugify($catName);
        }
        else{
            $slug = $catSlug;
        }
        if (empty($catName)) {
            $msg = "Category field must not be empty!";
            return $msg;
        } else {
            try{
                $query = "UPDATE category
                SET
                name = '$catName',
                slug = '$catSlug',
                title='$title',
                description='$description',
                content='$content'
                WHERE id = '$catid'";
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
                $msg = "Try Different Category Name or Slug";
                return $msg;
            }
        }
    }
    public function delCatById($id)
    {
        $id = $this->fm->validation($id);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "DELETE FROM category WHERE id = '$id'";
        $deldata = $this->db->delete($query);
        if ($deldata) {
            $msg = true;
            return $msg;
        } else {
            $msg = "Category Not Deleted!";
            return $msg;
        }
    }
}
