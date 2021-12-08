<?php
    session_start();
    //Database class for connect to the database
    include_once 'database.php';
    include_once 'hashPass.php';

    $restaurantName = $_POST['restaurantName'];
    $address = $_POST['address'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    //Check validation of the input
    $newrestaurantName = test_input($restaurantName);
    $newaddress = test_input($address);
    $newlatitude = test_input($latitude);
    $newlongitude = test_input($longitude);

    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        //check if loged in 
        if(isset($_SESSION['session_status'])){
            //check the satus of log in is fine
            if(!empty($_SESSION['session_status'])){
                //check if loged in for real
                if($_SESSION['session_status'] == 'true'){
                    if (isset($newrestaurantName) && isset($newlatitude) && isset($newlongitude)){
                        if(!empty($newrestaurantName) && !empty($newlatitude) && !empty($newlongitude)){
                            if(!preg_match('/[0-9a-zA-Z ]+/', $newrestaurantName)){
                                $_SESSION['session_mess'] = $_SESSION['session_mess'] . " Invalid restaurant name";
                            }
                            if(!preg_match('/^-?([0-9](\.\d+)?|[1-8][0-9](\.\d+)?|90\.?0*)$/', $newlatitude)){
                                $_SESSION['session_mess'] = $_SESSION['session_mess'] . " Invalid latitude";
                            }
                            if(!preg_match('/^-?([0-9](\.\d+)?|[1-9][0-9](\.\d+)?|1[0-7][0-9](\.\d+)?|180\.?0*)$/', $newlongitude)){
                                $_SESSION['session_mess'] = $_SESSION['session_mess'] . " Invalid longitude";
                            }
                            if(!empty($_FILES['myfile'])){
                                $file_name = $_FILES['myfile']['name'];   
	                            $temp_file_location = $_FILES['myfile']['tmp_name'];
                                $uploadOk = 1;
                                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                                    
                                //Check if it is real image
                                if($check !== false) {
                                    $_SESSION['session_mess'] = $_SESSION['session_mess'] . "File is an image - " . $check["mime"];
                                    $uploadOk = 1;
                                } 
                                else{
                                    echo "File is not an image.";
                                    $uploadOk = 0;
                                }
                            }

                            if(!empty($_SESSION['session_mess'])){
                                header('Location: /Toolman/submission.php');
                                exit("Invalid Input(s)");
                            }
                            else{
                                
                                $database = new Database();
                                $db = $database->getConnection();
                                $conn = $db['connection'];
                                if($db['status'] == '0'){
                                    echo "Connection to database failed: " . $db['message'];
                                }
                                else{
                                    try{
                                        $query = "insert into `restaurants`(`name`, `latitude`, `longitude`, `address`,`id`) VALUES ('$newrestaurantName', '$newlatitude', '$newlongitude', '$newaddress', null)";
                                        $request = $conn->prepare($query);
                                        $result = $request->execute();
                                        if(!empty($result)){
                                            $_SESSION['session_mess'] = 'Success on submission!';
                                            header('Location: /Toolman/submission.php');
                                        }    
                                    }
                                    catch (Exception $e) {
                                        die("something went wrong".$e->getMessage());
                                    }
                                }
                            }
                        }
                        else{
                            $_SESSION['session_mess'] = 'Some fields missing';
                            header('Location: /Toolman/submission.php');
                        }
                    }
                    else{
                        $_SESSION['session_status'] = 'false';
                        $_SESSION['session_mess'] = 'Invalid input';
                        header('Location: /Toolman/submission.php');
                    }
                }
                else{
                    $_SESSION['session_mess'] = 'Not log in yet, go log in';
                    header('Location: /Toolman/submission.php');
                }
            }
            else{
                $_SESSION['session_mess'] = 'Something wrong with log in status';
                header('Location: /Toolman/submission.php');
            }
        }
        else{
            $_SESSION['session_mess'] = 'Not log in yet, go log in';
            header('Location: /Toolman/submission.php');
        }
    }
    else{
        $_SESSION['session_mess'] = 'Invalid method';
        header('Location: /Toolman/submission.php');
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>