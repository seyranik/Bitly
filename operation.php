<?php 
$authorization = "Authorization: Bearer your token";
if (basename($_SERVER['PHP_SELF']) == 'create.php')
{
    if ($_POST)
    {
        $longUrl=htmlspecialchars_decode($_POST["long-url"]);
        $title=htmlspecialchars_decode($_POST["title"]);

        $data = array("long_url" => $longUrl, "title" => $title);                                                                    
        $data_string = json_encode($data);                                                                                   
                                                                                                                            
        $ch = curl_init('https://api-ssl.bitly.com/v4/bitlinks');                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            $authorization,                                                                                
            'Content-Type: application/json')                                                                       
        );                                                                                                                   
                                                                                                                            
        $result = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        

        if($statusCode==200 || $statusCode==201){

            $status="Success";
            $response = json_decode($result);
            $shortLink=$response->{'link'};
            $created=$response->{'created_at'};
            $long_url=$response->{'long_url'};
            $title=$response->{'title'};

            $alert = [
                'icon' => $status,
                'title' => $status,
                'text' => 'Created at : '.$created.'        '.'Title : '.$title.'       '.'Short Url : '.$shortLink.'       '.'Long Url : '.$long_url
            ];
        }
        else{
            $status="Invaild";
            $alert = [
                'icon' => $status,
                'title' => $statusCode,
                'text' => $result
            ];
        }
    }
}

if (basename($_SERVER['PHP_SELF']) == 'list.php')
{
    $ch = curl_init('https://api-ssl.bitly.com/v4/groups/Bjcv0aS0tNn/bitlinks');                                                                      
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        $authorization,                                                                                
        'Content-Type: application/json')                                                                       
    );                                                                                                                   
                                                                                                                            
    $result = curl_exec($ch);
    $response = json_decode($result);
    $options = $response->links;
    $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
}

if (basename($_SERVER['PHP_SELF']) == 'stats.php')
{

    $ch = curl_init('https://api-ssl.bitly.com/v4/groups/Bjcv0aS0tNn/bitlinks');                                                                      
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        $authorization,                                                                                
        'Content-Type: application/json')                                                                       
    );                                                                                                                   
                                                                                                                            
    $result = curl_exec($ch);
    $response = json_decode($result);
    $options = $response->links;
    $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($_GET)
    {
        $query=$_GET['shortlink'];
        
        $ch = curl_init('https://api-ssl.bitly.com/v4/bitlinks/'.$query.'/clicks/summary?unit=month&units=-1');                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            $authorization,                                                                                
            'Content-Type: application/json')                                                                       
        );
        $totalClick = curl_exec($ch);
        $totalClick = json_decode($totalClick);                                        
        
       
        $post = [
            'bitlink_id' => $query,
        ];
        
        $ch = curl_init('https://api-ssl.bitly.com/v4/bitlinks/'.$query);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            $authorization,                                                                                
            'Content-Type: application/json')                                                                       
        );                                                                    
        
        // execute!
        $resultt = curl_exec($ch);
        $responsee = json_decode($resultt);
        $optionss = $responsee->created_at;
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);


        $ch = curl_init('https://api-ssl.bitly.com/v4/groups/Bjcv0aS0tNn/bitlinks');                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            $authorization,                                                                                
            'Content-Type: application/json')                                                                       
        );                                                                                                                   
                                                                                                                                
        $result = curl_exec($ch);
        $response = json_decode($result);
        $options = $response->links;
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    }
}


if (basename($_SERVER['PHP_SELF']) == 'update.php')
{
    if ($_GET)
    {
        $title=$_GET['title'];
        $shortlink=$_GET['shortlink'];
    }
    else
    {
        header('Location: list.php');
    }
    if($_POST){

        $title=$_POST['title'];
        $shortlink=$_POST['shortlink'];

        $data = array("title" => $title);                                                                    
        $data_string = json_encode($data); 

        $ch = curl_init('https://api-ssl.bitly.com/v4/bitlinks/'.$shortlink);                  
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            $authorization,                                                                                
            'Content-Type: application/json')                                                                       
        );                                                                                                                   
                                                                                                                 
        $result = curl_exec($ch);
        $response = json_decode($result);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if($statusCode==200 || $statusCode==201)
        {
            $alert = [
                'icon' => $status,
                'title' => 'Success',
                'text' => 'Update is successful'
            ];
        }
        else{
            $alert = [
                'icon' => $status,
                'title' => 'Invaild',
                'text' => 'Update failed'
            ];
        }
        header("Refresh:4; url=list.php", true, 303);
    }
}

if (basename($_SERVER['PHP_SELF']) == 'index.php')
{
    $ch = curl_init('https://api-ssl.bitly.com/v4/groups/Bjcv0aS0tNn/bitlinks');                                                                      
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        $authorization,                                                                                
        'Content-Type: application/json')                                                                       
    );                                                                                                                   
                                                                                                                            
    $result = curl_exec($ch);
    $response = json_decode($result);
    $options = $response->links;
    $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
}



?>
