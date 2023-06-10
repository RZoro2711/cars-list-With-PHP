<?php
namespace Libs\Database;
use PDOException;

class UsersTable
{
    private $db;
    
    public function __construct(MySQL $mysql){
        $this->db = $mysql->connect();
    }

    public function insert($data){
        try{
            $statement = $this->db->prepare("INSERT INTO users (name, email, phone, address, password, created_at) VALUES(:name, :email, :phone, :address, :password , NOW())");
            $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
            $statement->execute($data);
            return $this->db->lastInsertId();
        }catch(PDOException $e){
            echo $e->getMessage();
            exit();
        }
    }

    public function getAll(){
        $statement = $this->db->query("SELECT users.* , roles.name AS role, roles.value AS value FROM users LEFT JOIN roles on users.role_id = roles.id");
        return $statement->fetchAll();
    }

    public function findByEmailAndPassword($email, $password){
        try{
            $statement = $this->db->prepare("SELECT * FROM users where email=:email");
        $statement->execute(["email" => $email]);
        $user = $statement->fetch();
        if($user) {
            if(password_verify($password, $user->password)){
            return $user;
            }
        }
        return false;
        }catch(PDOException $e){
            echo $e->getMessage();
            exit();
        }
    }

    public function changeRole($id, $role_id){
        try{
            $statement = $this->db->prepare("UPDATE users SET role_id=:role_id WHERE id=:id");
            $statement->execute(["role_id" => $role_id, "id" => $id]);
            return $statement->rowCount();
        }catch(PDOException $e){
            echo $e->getMessage();
            exit();
        }
    }

    
    public function suspend($id){
        try{
            $statement = $this->db->prepare("UPDATE users SET suspended = 1 WHERE id=:id");
            $statement->execute(["id" => $id]);
            return $statement->rowCount();
        }catch(PDOException $e){
            echo $e->getMessage();
            exit();
        }
    }
    public function unsuspend($id){
        try{
            $statement = $this->db->prepare("UPDATE users SET suspended = 0 WHERE id=:id");
            $statement->execute(["id" => $id]);
            return $statement->rowCount();
        }catch(PDOException $e){
            echo $e->getMessage();
            exit();
        }
    }

    public function deleteRole($id){
        try{
            $statement = $this->db->prepare("DELETE FROM users WHERE id=:id");
            $statement->execute(["id" => $id]);
            return $statement->rowCount();
        }catch(PDOException $e){
            echo $e->getMessage();
            exit();
        }
    }





    public function countryListInsert($data){
        try{
            $statement = $this->db->prepare("INSERT INTO countries_list (country_name, country_logo) VALUES(:country_name, :country_logo)");
            $statement->execute($data);
            return $this->db->lastInsertId();
        }catch(PDOException $e){
            echo $e->getMessage();
            exit();
        }
    }

    public function countryListedit($data){
        try{
            $statement = $this->db->prepare("UPDATE countries_list SET country_name=:country_name, country_logo=:country_logo WHERE id=:id");
            $statement->execute($data);
            return $this->db->lastInsertId();
        }catch(PDOException $e){
            echo $e->getMessage();
            exit();
        }
    }
    public function countryShow($id){
        $statement = $this->db->query("SELECT * FROM countries WHERE id=$id");
        return $statement->fetchAll();
    }


    public function countryLgoedit($data){
        try{
            $statement = $this->db->prepare("UPDATE countries SET country_name=:country_name, country_flag=:country_flag, brand_name =:brand_name, photo=:photo WHERE id=:id");
            $statement->execute($data);
            return $this->db->lastInsertId();
        }catch(PDOException $e){
            echo $e->getMessage();
            exit();
        }
    }
    public function countryListShow(){
        $statement = $this->db->query("SELECT * FROM countries_list");
        return $statement->fetchAll();
    }
    public function showcountryList($id){
        $statement = $this->db->query("SELECT * FROM countries_list WHERE id=$id");
        return $statement->fetchAll();
    }

    public function insertCountry($data){
        try{
            $statement = $this->db->prepare("INSERT INTO countries (country_name, country_flag, created_at, photo ,brand_name) VALUES(:country_name,:country_flag, NOW(), :photo, :brand_name)");
            $statement->execute($data);
            return $this->db->lastInsertId();
        }catch(PDOException $e){
            echo $e->getMessage();
            exit();
        }
    }


    public function country_name($country_name){
        $statement = $this->db->query("SELECT * FROM countries where country_name='$country_name'");
        return $statement->fetchAll();
    }
    public function country_list($country_name){
        $statement = $this->db->query("SELECT * FROM countries_list where country_name='$country_name'");
        return $statement->fetchAll();
    }
    public function brand_list($id){
        $statement = $this->db->query("SELECT * FROM brands where id=$id");
        return $statement->fetchAll();
    }


    public function brandname($id){
            $statement = $this->db->query("SELECT brand_name FROM countries WHERE id=$id");
            return $statement->fetch();
            
    }

    public function detailedit($name,$car,$founder,$company,$company_photo,$time,$description1,$latest_model,$latest_model_pic,$price,$description2,$description3, $location){
        try{
            $statement = $this->db->prepare("UPDATE brands SET car_name=:car, company_name=:company_name, founder_name =:founder, company_pic=:company_photo, time=:time , description1=:description1, latest_model=:latest_model, latest_model_pic=:latest_model_pic , price=:price, description2=:description2, description3=:description3, location=:location WHERE car_name=:name");
            $statement->execute(["car"=>$car, "founder"=>$founder, "company_name"=>$company, "company_photo"=>$company_photo, "time"=>$time, "description1"=>$description1,"latest_model"=>$latest_model, "latest_model_pic"=>$latest_model_pic, "price"=>$price, "description2"=>$description2, "description3"=>$description3, "location"=>$location, "name"=>$name]);
            return $this->db->lastInsertId();
        }catch(PDOException $e){
            echo $e->getMessage();
            exit();
        }
    }



    public function brand($data){
        try{
            $statement = $this->db->prepare("INSERT INTO brands (car_name, company_name, founder_name, company_pic, time, description1, latest_model, latest_model_pic, price, description2, description3, location) VALUES(:car_name, :company_name, :founder_name, :company_pic, :time, :description1, :latest_model , :latest_model_pic, :price, :description2, :description3, :location)");
            $statement->execute($data);
            return $this->db->lastInsertId();
        }catch(PDOException $e){
            echo $e->getMessage();
            exit();
        }
    }

    public function detail($id){
        $result = $this->db->query("SELECT countries.*, brands.* FROM countries LEFT JOIN brands ON countries.brand_name = brands.car_name WHERE countries.id = $id");
        return $result->fetchAll();
    }

    public function deletebrand($id){
        try{
            $statement = $this->db->prepare("DELETE FROM countries WHERE id=:id");
            $statement->execute(["id" => $id]);
            return $statement->rowCount();
        }catch(PDOException $e){
            echo $e->getMessage();
            exit();
        }
    }
    public function deletecountry($id){
        try{
            $statement = $this->db->prepare("DELETE FROM countries_list WHERE id=:id");
            $statement->execute(["id" => $id]);
            return $statement->rowCount();
        }catch(PDOException $e){
            echo $e->getMessage();
            exit();
        }
    }
    public function deletedetail($id){
        try{
            $statement = $this->db->prepare("DELETE FROM brands WHERE id=:id");
            $statement->execute(["id" => $id]);
            return $statement->rowCount();
        }catch(PDOException $e){
            echo $e->getMessage();
            exit();
        }
    }



    

    public function delete(){
        $this->db->query('TRUNCATE TABLE users');
    }
}
