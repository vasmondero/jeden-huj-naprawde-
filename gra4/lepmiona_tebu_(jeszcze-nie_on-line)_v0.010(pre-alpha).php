<?php 
        require_once('./class/GameManager.class.php');
        session_start();
        if(!isset($_SESSION['gm']))
        {
            $gm = new GameManager();
            $_SESSION['gm'] = $gm;
        } 
        else
        {
            $gm = $_SESSION['gm'];
        }
        $v = $gm->v;
        $gm->sync();
        
        if(isset($_REQUEST['action'])) 
        {
            switch($_REQUEST['action'])
            {
                case 'upgradeBuilding':
                    if($v->upgradeBuilding($_REQUEST['building']))
                    {
                        echo "Ulepszono budynek: ".$_REQUEST['building'];
                    }
                    else
                    {
                        echo "Nie udało się ulepszyć budynku: ".$_REQUEST['building'];
                    }
                    
                break;
                default:
                    echo 'Nieprawidłowa zmienna "action"';
            }
        }




        
        
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

        
<body style="background-image: url(tlo.gif);" id="div">
             
            <!--layout-->  
               
            <div class="container-fluid" >

                <div class="row" id="left">

                    <div class="col-2" style='border:groove ; border-color:rgb(90, 57, 14) ; height: 50%; background:linear-gradient(rgb(90, 57, 14), #d69b57);'>
                        Nick: Mihauek
                    </div>

                    <div class="col-2" style='border:groove ; border-color:rgb(90, 57, 14) ; height: 50%; background:linear-gradient(rgb(90, 57, 14), #d69b57);'>
                    Drewno: <?php echo $v->showStorage("wood"); ?>
                    </div>

                    <div class="col-2" style='border:groove ; border-color:rgb(90, 57, 14) ; height: 50%; background:linear-gradient(rgb(90, 57, 14), #d69b57);'>
                    Kamień: <?php echo $v->showStorage("iron"); ?>
                    </div>

                    <div class="col-2" style='border:groove ; border-color:rgb(90, 57, 14) ; height: 50%; background:linear-gradient(rgb(90, 57, 14), #d69b57);'>
                      Żelazo  
                    </div>

                    <div class="col-2" style='border:groove; border-color:rgb(90, 57, 14) ; height: 50%; background:linear-gradient(rgb(90, 57, 14), #d69b57);'>
                        Złoto
                    </div>

                    <div class="col-2" >
                        <div class="row" style="border:groove ; border-color:rgb(90, 57, 14) ; height: 30px; background:gold;">waluta premium</div>

                    </div>

                    <div class="col-10" >  <div class="row">
                        <img style= "border:groove ; border-color:rgb(90, 57, 14) ; width: 100%;  " src="mapa v3.png" >
                      
</div>

                    </div>

                    <div class="col-2">
                        <div class="row" style="border:groove ; border-color:rgb(90, 57, 14) ;  background:linear-gradient(rgb(90, 57, 14), #d69b57); ">

                        Budynek drwala, poziom <?php echo $v->buildingLVL("woodcutter"); ?> <br>
                Zysk/h: <?php echo $v->showHourGain("wood"); ?>
                
                <?php if($v->checkBuildingUpgrade("woodcutter")) : ?>
                <a href="index.php?action=upgradeBuilding&building=woodcutter">
                    <button>Rozbuduj budynek drwala</button>
                </a>
                <?php else : ?>
                    <button onclick="missingResourcesPopup()">Rozbuduj drwala</button>
                <br>
                <?php endif; ?>




                
                Kopalnia kamienia, poziom <?php echo $v->buildingLVL("ironMine"); ?> <br>
                Zysk/h: <?php echo $v->showHourGain("iron"); ?>
                
                <?php if($v->checkBuildingUpgrade("ironMine")) : ?>
                <a href="index.php?action=upgradeBuilding&building=ironMine">
                    <button>Rozbuduj kopalnię kamienia</button>
                </a>
                <?php else : ?>
                    <button onclick="missingResourcesPopup()">Rozbuduj kopalnię kamienia</button>
                <br>
                <?php endif; ?>

                Kopalnia Żelaza, poziom <?php echo $v->buildingLVL("ironMine"); ?> <br>
                Zysk/h: <?php echo $v->showHourGain("iron"); ?>
                
                <?php if($v->checkBuildingUpgrade("ironMine")) : ?>
                <a href="index.php?action=upgradeBuilding&building=ironMine">
                    <button>Rozbuduj kopalnię żelaza</button>
                </a>
                <?php else : ?>
                    <button onclick="missingResourcesPopup()">Rozbuduj kopalnię żelaza</button>
                <br>
                <?php endif; ?>
            </div>

                        <div class="row" style="border:groove ; border-color:rgb(90, 57, 14) ; height:   150px; background:linear-gradient(#d69b57,rgb(90, 57, 14))  ; ">Wojsko
            
                
                        
                      
                        


                        </div>
                    </div>



            </div>
        
            

                     </div>
                        
                   

                    </div>

            </div>




            
                
                    
                
            
    </div>
    <script>
        function missingResourcesPopup() {
            window.alert("Brakuje zasobów");
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

             </body>
</html>