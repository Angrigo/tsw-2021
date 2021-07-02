<!DOCTYPE html>
<html>

<?php include("head.php"); ?>

<body>
    <?php include("header.php"); ?>
    
    <div class="content">
        <div class="column_left">
            
        </div>

        <div class="column_middle">
        <div id="assistenza">
            <h2>Contattaci</h2>
            <p>Per ricevere assistenza non esitare a contattarci!</p>
        </div>
  
        <img id="contattaci" src="assets/images/contattaci.png">
    
    
      <form id="test" onSubmit="return validaModuloContattaci(this);">
        <label for="fname">Nome</label>
        <input type="text" id="fname" name="fname" placeholder="Il tuo nome">
        <label for="lname">Cognome</label>
        <input type="text" id="lname" name="lname" placeholder="Il tuo cognome">
        <label for="email"> Email </label>
        <input type="email" id="email" name="email" placeholder="La tua email">
        <label for="country">Nazionalità</label>
        <select id="country" name="country">
          <option value="italia">Italia</option>
          <option value="spagna">Francia</option>
          <option value="germania">Germania</option>
          <option value="germania">Francia</option>
          <option value="germania">Spagna</option>
          <option value="altro">Altro</option>
        </select>
        <label for="subject">Oggetto</label>
        <textarea id="subject" name="subject" placeholder="Digita il testo qui..." ></textarea>

		
        <button id="bottonelogin" type="submit">Invia</button>
      </form>
        </div>

        <div class="column_right">
          
        </div>
    </div>
    <?php include("footer.html"); ?>
</body>
<script src="valida_modulo_contattaci.js" type="text/javascript"></script>

</html>