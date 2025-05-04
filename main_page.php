
<?php




$result = '';


$from = $_POST['from'] ?? '';
$to = $_POST['to'] ?? '';// ?? '' to say: “If nothing is set, just make it an empty string


if(isset($_POST['convert_button'])){


  
  if (isset($_POST["amount_to_convert"]) && is_numeric($_POST["amount_to_convert"])) {
    $amount = trim($_POST["amount_to_convert"]);

    if ($_POST['from'] === 'Morrocan_Dirham' && $_POST['to'] === 'Morrocan_Ryal') {
        $result = $amount * 20 .' Ryal';

    } elseif ($_POST['from'] === 'Morrocan_Ryal' && $_POST['to'] === 'Morrocan_Dirham') {
        $result = $amount / 20 .' DH';
    } else {
        $result = $amount;
    }

   
} else {
    echo "Please enter a numeric Amount";

}

// If there's a result in the session, display it and unset it for next reload
if (isset($_SESSION['amount_converted'])) {
  $result = $_SESSION['amount_converted'];
  unset($_SESSION['amount_converted']);  // Clear the session variable
}
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DH <-->Ryal </title>
  <style>
  body {
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(to bottom right, #008000, #8B4513, #FF0000);
     background-size: cover;
    background-attachment: fixed; 
    color: #333;
  }
  
  h1 {
    text-align: center;
    margin-top: 30px;
    color: white;
    font-size: 3em;
    text-shadow: 2px 2px 5px rgba(0,0,0,0.3);
    overflow:auto;
  }

  .quote {
    text-align: center;
    color: white;
    font-size: 1.3em;
    margin-bottom: 30px;
    font-style: italic;
    text-shadow: 1px 1px 4px rgba(0,0,0,0.4);
  }

  .form_container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px;
  }

  form {
    background-color: rgba(255, 255, 255, 0.95);
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    width: 500px;
  }

  input[type="text"], select {
    width: 100%;
    padding: 12px;
    margin-top: 15px;
    border: 1px solid #ccc;
    border-radius: 10px;
    font-size: 16px;
  }

  button {
    margin-top: 20px;
    padding: 12px 20px;
    font-size: 16px;
    background-color: #8B0000;
    color: white;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: background 0.3s ease;
  }

  button:hover {
    background-color: #a11e1e;
  }

  h2 {
    text-align: center;
    margin: 20px 0;
    color: #444;
  }
  @keyframes fadeInUp {
  0% {
    opacity: 0;
    transform: translateY(30px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

h1 {
  animation: fadeInUp 1.2s ease-out forwards;
}
.moving-arrows {
  display: inline-block;
  animation: move-arrows 1s linear infinite;
}

@keyframes move-arrows {
  0%   { transform: translateX(0); }
  50%  { transform: translateX(5px); }
  100% { transform: translateX(0); }
}

.moving-arrows span {
  color: #fff;
  font-weight: bold;
  animation: blink-arrows 1s ease-in-out infinite;
}

@keyframes blink-arrows {
  0%, 100% { opacity: 1; }
  50%      { opacity: 0.5; }
}

select {
  background-image: url('img/morocco_flag.png');
  background-repeat: no-repeat;
  background-position: right 10px center;
  background-size: 20px 15px;
  padding-right: 30px;
}


</style>


    
</head>
  <body>
  <div class="gradient-bar">
  <h1>DH <span class="moving-arrows"><span>&lt;</span>----------------<span>&gt;</span></span> Ryal</h1>

  </div>

    
    <div class="form_container">

    <form method="POST" action="">

        
      <div style="
      margin-top: 50px;
      display: grid;
      grid-template-columns:500px;"

      >
        <!-- the Amount to convert  -->
      
          <input type="text" placeholder=" enter your Amount" name="amount_to_convert">
      

    </div>




    <div style="display: grid;
      grid-template-columns: 1fr auto 1fr;
      margin-top: 50px;
    ">

      <!-- the Amount after converting   -->
       <div>

        <select name="from" >

          <option  disabled selected >Select Currency</option>
          <option value="Morrocan_Dirham" <?= $from === 'Morrocan_Dirham' ? 'selected' : '' ?>>Moroccan Dirham (DH)<a href=""></a></option>
<option value="Morrocan_Ryal" <?= $from === 'Morrocan_Ryal' ? 'selected' : '' ?>>Ryal Maghribi</option>


        </select>

    </div>



    <div>
    
          <h2> TO</h2>
          <button type="submit" name="convert_button"> Convert</button>

    </div>


      <div>
          <select name="to" >
            <option disabled selected  >Select Currency</option>
           <option value="Morrocan_Dirham" <?php $to==='Morrocan_Dirham'? 'selected': ''?>>
             Morrocan_Dirham(DH)</option>

           <option value="Morrocan_Ryal" <?= $to==='Morrocan_Ryal'? 'selected' :'' ?>> Morrocan_Ryal</option>

           <!-- If the user previously selected "Morrocan_Dirham" as the value of the to dropdown, then add the selected attribute to this option. -->


          </select>
      </div>


      


</div>


   <div style="
    margin-top: 50px;
    display: grid;
    grid-template-columns:500px";
    >
     

    <input type="text" name="amount_converted" value="<?= htmlspecialchars($result) ?>">


        

   </div>

    </form>
 </div>


  



  </body>
</html>

