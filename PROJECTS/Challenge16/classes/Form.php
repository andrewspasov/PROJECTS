<?php

namespace Form;

class Form extends \DB 
{
    private $query = [
                        'create' => 'INSERT INTO company(image_cover_url, main_title, subtitle, info, phone, location, select_option_id, first_image_url, first_desc, second_image_url, second_desc, third_image_url, third_desc, company_desc, linkedin, facebook, twitter, google)
                        VALUES (:image_cover_url, :main_title, :subtitle, :info, :phone, :location, :select_option_id, :first_image_url, :first_desc, :second_image_url, :second_desc, :third_image_url, :third_desc, :company_desc, :linkedin, :facebook, :twitter, :google)',
                        'read' => 'SELECT company.id, image_cover_url, main_title, subtitle, info, phone, location, select_option_id, type, first_image_url, first_desc, second_image_url, second_desc, third_image_url, third_desc, company_desc, linkedin, facebook, twitter, google FROM company JOIN select_option ON select_option.id = company.select_option_id ORDER BY id DESC LIMIT 1'
                    ];


    public function __construct(){
        parent::__construct();
    }

    public function getForm(){
        $pdo = $this->instance;
        
        $sql = $this->query['read'];
        
        $stmt = $pdo->query($sql);
        
        return $stmt->fetchAll();
    }

    public function createForm(array $params){
        $pdo = $this->instance;
        
        $sql = $this->query['create'];

        $stmt = $pdo->prepare($sql);
        
        // $stmt->execute($params);
        $id = $pdo->lastInsertId();

        if($stmt->execute($params)){
            $id = $pdo->lastInsertId();
            return header('Location: third-page.php?id=' . $id);

        } else {
            return false;
        };
        

    }

}