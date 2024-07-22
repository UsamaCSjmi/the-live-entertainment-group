<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');
 ?>
<?php 
class Genre
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    
    public function genreInsert($genreName,$genreSlug)
    {
        $genreName = $this->fm->validation($genreName);
        $genreName = mysqli_real_escape_string($this->db->link, $genreName);
        $genreSlug = $this->fm->validation($genreSlug);
        $genreSlug = mysqli_real_escape_string($this->db->link, $genreSlug);
        if($genreSlug==""){
            $slug = $this->fm->slugify($genreSlug);
        }
        else{
            $slug = $genreSlug;
        }
        if (empty($genreName)) {
            $msg = "Genre Name field must not be empty!";
            return $msg;
        } else {
            try{
                $query = "INSERT INTO genre(name,slug) VALUES('$genreName','$slug')";
                $genreinsert = $this->db->insert($query);
                if ($genreinsert) {
                    $msg = true;
                    return $msg;
                } else {
                    $msg = "Genre Not Inserted";
                    return $msg;
                }
            }
            catch(Exception $e){
                $msg = "Try Different Genre Name or Slug";
                return $msg;
            }
        }
    }

    public function updateStatus($genreId, $is_active){
        $genreId = $this->fm->validation($genreId);
        $genreId = mysqli_real_escape_string($this->db->link, $genreId);
        $is_active = $this->fm->validation($is_active);
        $is_active = mysqli_real_escape_string($this->db->link, $is_active);
        if (empty($genreId)) {
            $msg = "Genre ID field must not be empty!";
            return $msg;
        } else {
            $query = "UPDATE genre
        	SET
        	is_active = '$is_active'
        	WHERE id = '$genreId'";
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

    public function getAllGenre()
    {
        $query = "SELECT * FROM genre ORDER BY 'name' ASC";
        $result = $this->db->select($query);
        return $result;
    }

    public function getAllActiveGenre()
    {
        $query = "SELECT * FROM genre WHERE is_active='1' ORDER BY id ASC";
        $result = $this->db->select($query);
        return $result;
    }


    public function getGenreById($genreid)
    {
        $genreid = $this->fm->validation($genreid);
        $genreid = mysqli_real_escape_string($this->db->link, $genreid);
        $query = "SELECT * FROM genre WHERE id = '$genreid'";
        $result = $this->db->select($query);
        if($result){
            return mysqli_fetch_array($result);
        }
        else{
            return false;
        }
    }

    public function getGenreBySlug($slug)
    {
        $query = "SELECT * FROM genre WHERE slug = '$slug' AND is_active = '1'";
        $result = $this->db->select($query);
        return $result;
    }

    public function genreUpdate($genreName, $genreSlug, $genreid)
    {
        $genreName = $this->fm->validation($genreName);
        $genreName = mysqli_real_escape_string($this->db->link, $genreName);
        $genreid = $this->fm->validation($genreid);
        $genreid = mysqli_real_escape_string($this->db->link, $genreid);
        $genreSlug = $this->fm->validation($genreSlug);
        $genreSlug = mysqli_real_escape_string($this->db->link, $genreSlug);
        if($genreSlug==""){
            $slug = $this->fm->slugify($genreName);
        }
        else{
            $slug = $genreSlug;
        }
        if (empty($genreName)) {
            $msg = "Genre field must not be empty!";
            return $msg;
        } else {
            try{
                $query = "UPDATE genre
                SET
                name = '$genreName',
                slug = '$genreSlug'
                WHERE id = '$genreid'";
                $updated_row = $this->db->update($query);
                if ($updated_row) {
                    $msg = true;
                    return $msg;
                } else {
                    $msg = "Genre Not Updated.";
                    return $msg;
                }
            }
            catch(Exception $e){
                $msg = "Try Different Genre Name or Slug";
                return $msg;
            }
        }
    }
    public function delGenreById($id)
    {
        $id = $this->fm->validation($id);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "DELETE FROM genre WHERE id = '$id'";
        $deldata = $this->db->delete($query);
        if ($deldata) {
            $msg = true;
            return $msg;
        } else {
            $msg = "Genre Not Deleted!";
            return $msg;
        }
    }
}
