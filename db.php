<?php
    try{
        $connection = new PDO("mysql:host=localhost;dbname=eshop","root","");
    }
    catch (Exception $e){
        echo $e->getMessage();
    }
    function getUser($login){
        global $connection;

        try{
            $query = $connection->prepare("select u.id, u.login, u.password, u.fullname, r.rolename, r.code from users u inner join roles r on u.role_id = r.id where login = ?");
            $query->execute([$login]);
            $result = $query->fetch();
        }
        catch (Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }
    function registerUser($login, $password, $fullname){
        global $connection;
        try{
            $query = $connection->prepare("INSERT INTO users(login, password, fullname) values (?,?,?)");
            $query->execute([$login, $password, $fullname]);
        }
        catch (Exception $e){
            echo $e->getMessage();
        }
    }
    function addCategory($name, $description){
        global $connection;

        try{
            $query = $connection->prepare("INSERT INTO categories(name, description) VALUES (?,?)");
            $query->execute([$name, $description]);
        }
        catch (Exception $e){
            echo $e->getMessage();
        }
    }
    function addGood($name, $description, $price, $qty, $image, $category_id){
        global $connection;

        try{
            $query = $connection->prepare("INSERT INTO goods (name,description,price, qty, image, category_id) values (?,?,?,?,?,?)");
            $query->execute([$name, $description, $price, $qty, $image, $category_id]);
        }
        catch (Exception $e){
            echo $e->getMessage();
        }
    }
function updateGood($id, $name, $description, $price, $qty, $image, $category_id){
    global $connection;

    try{
        $query = $connection->prepare("UPDATE goods set name=:nm, description=:dr, price=:pr, qty=:qt, image=:img, category_id=:ci WHERE id=:id");
        $query->execute(
            array(
                "nm" => $name,
                "dr" => $description,
                "pr" => $price,
                "qt" => $qty,
                "img" => $image,
                "ci" => $category_id,
                "id" => $id
            )
        );
    }
    catch (Exception $e){
        echo $e->getMessage();
    }
}
 function deleteGood($id){
        global $connection;

        try{
            $query = $connection->prepare("DELETE FROM goods WHERE id = ?");
            $query->execute([$id]);
        }
        catch (Exception $e){
            echo $e->getMessage();
        }
 }
 function getAllGoods(){
        global $connection;
        try{
            $query = $connection->prepare("select g.id, g.name, g.description, g.price, g.qty, g.image, c.name as cname from goods g inner join categories c on g.category_id = c.id");
            $query->execute();
            $result = $query->fetchAll();
        }
        catch (Exception $e){
            echo $e->getMessage();
        }
        return $result;
 }
function getGood($id){
    global $connection;

    try {
        $query = $connection->prepare("select g.id, g.name, g.description, g.price, g.qty, g.image, c.name as categoryname, g.category_id FROM goods g join categories c on c.id = g.category_id where g.id = ?");
        $query->execute([$id]);

        $result = $query->fetch();
    }
    catch(Exception $e){
        echo $e->getMessage();
    }

    return $result;
}
function getAllCategories(){
    global $connection;

    try{
        $query = $connection->prepare("select * from categories");
        $query->execute();
        $result = $query->fetchAll();
    }
    catch(Exception $e){
        echo $e->getMessage();
    }

    return $result;
}
function getGoodsCountByCat($cid){
    global $connection;

    try{
        $query = $connection->prepare("select count(*) from goods where category_id = ?");
        $query->execute([$cid]);
        $result = $query->fetch();
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
    return $result[0];
}

function deleteCategory($id){
    global $connection;
    if(getGoodsCountByCat($id) > 0){
        return false;
    }
    try{
        $query = $connection->prepare("DELETE FROM categories WHERE id = ?");
        $result = $query->execute([$id]);
    }
    catch (Exception $e){
        echo $e->getMessage();
    }
    return true;
}
function getGoodByCat($cid){
    global $connection;

    try {
        $query = $connection->prepare("select * from goods where category_id = ?");
        $query->execute([$cid]);

        $result = $query->fetchAll();
    }
    catch(Exception $e){
        echo $e->getMessage();
    }

    return $result;
}
function buyGood($uid, $gid, $gnum){
    global $connection;
    try{
        $query = $connection->prepare("INSERT INTO basket(uid, gid, gnum) values (?,?,?)");
        $query->execute([$uid, $gid, $gnum]);
    }
    catch (Exception $e){
        echo $e->getMessage();
    }
}
function commentGood($uid, $gid, $comment){
    global $connection;
    try{
        $query = $connection->prepare("INSERT INTO comments(uid, gid, comment, commentDate) values (?,?,?, now())");
        $query->execute([$uid, $gid, $comment]);
    }
    catch (Exception $e){
        echo $e->getMessage();
    }
}
function getAllComments(){
    global $connection;
    try{
        $query = $connection->prepare("select * from comments c");
        $query->execute();
        $result = $query->fetchAll();
    }
    catch (Exception $e){
        echo $e->getMessage();
    }
    return $result;
}
?>