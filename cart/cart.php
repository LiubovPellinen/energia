<?php
include("../navigation.php");
?>



<div class="container-fluid custom-margin-container">

    <!--Row starts-->
    <div class="row">
        <div class="col-xl-2">             
        </div>

        <div class="col-xl-8"> 
            <!--Row starts-->
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">OSTOSKORI</span>
                    <span id="amount"  class="badge badge-danger badge-pill"></span>
                </h4>

                <div id="user_cart">                    
                </div>                  
                
                <div>               
                <ul class="list-group mb-3">                
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <span >YHTEENSÄ (EURO)</span>
                        <strong id="sum" ></strong>
                    </li>
                </ul> 
                
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <div class="text-success">
                            <h6 class="my-0">Promo koodi</h6>
                            <small>ESIMERKKIKOODI</small>
                        </div>
                        <span class="text-success">-5€</span>
                    </li>
                </ul>
                </div>

                <form class="card p-2">
                    <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promo koodi">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-danger">Lunasta</button>
                    </div>
                    </div>
                </form>
                </div>
                <div class="col-md-8 order-md-1">
                <h4 class="mb-3">POSTITUSOSOITE</h4>
                <form class="needs-validation" novalidate>
                    <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Etunimi</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                        <div class="invalid-feedback">
                        Kirjoita etunimi
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Sukunimi</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                        <div class="invalid-feedback">
                        Kirjoita sukunimi
                        </div>
                    </div>
                    </div>

                    <div class="mb-3">
                    <label for="email">Sähköposti</label>
                    <input type="email" class="form-control" id="email" placeholder="asiakas@gmail.com" required>
                    <div class="invalid-feedback">
                        Kirjoita sähkposti
                    </div>
                    </div>

                    <div class="mb-3">
                    <label for="address">Lähiosoite</label>
                    <input type="text" class="form-control" id="address" placeholder="00100 Kaivokatu 1 A 1" required>
                    <div class="invalid-feedback">
                        Kirjoita lähiosoite
                    </div>
                    </div>

                    <div class="mb-3">
                    <label for="address2">Toimitusosoite <span class="text-muted">(jos muu kuin lähiosoite)</span></label>
                    <input type="text" class="form-control" id="address2" placeholder="00100 Lukiokatu 1">
                    </div>

                    <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="country">Maa</label>
                        <select class="custom-select d-block w-100" id="country" required>
                        <option value="">Valitse...</option>
                        <option>Suomi</option>
                        </select>
                        <div class="invalid-feedback">
                        Kirjoita maa
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="state">Postitoimipaikka</label>
                        <select class="custom-select d-block w-100" id="state" required>
                        <option value="">Valitse...</option>
                        <option>Helsinki</option>
                        <option>Hämeenlinna</option>
                        </select>
                        <div class="invalid-feedback">
                        Kirjoita postitoimipaikka
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="zip">Postinumero</label>
                        <input type="text" class="form-control" id="zip" placeholder="13210" required>
                        <div class="invalid-feedback">
                        Kirjoita postinumero
                        </div>
                    </div>
                    </div>
                    <hr class="mb-4">
                    <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="same-address">
                    <label class="custom-control-label" for="same-address">Toimitusosoite on sama kuin lähiosoite</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="save-info">
                    <label class="custom-control-label" for="save-info">Tallenna nämä tiedot ja jätkä myöhemmin</label>
                    </div>
                    <hr class="mb-4">

                    <h4 class="mb-3">Maksutapa</h4>

                    <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                        <label class="custom-control-label" for="credit">Maksukortti</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                        <label class="custom-control-label" for="paypal">Paypal</label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cc-name">Maksajan nimi</label>
                        <input type="text" class="form-control" id="cc-name" placeholder="" required>
                        <small class="text-muted">Nimi samassa muodossa kuin kortilla</small>
                        <div class="invalid-feedback">
                        Kirjoita nimi samassa muodossa kuin kortilla
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cc-number">Korttinumero</label>
                        <input type="text" class="form-control" id="cc-number" placeholder="" required>
                        <div class="invalid-feedback">
                        Kirjoita korttinumero
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cc-expiration">Kortin voimassaoloaika</label>
                        <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                        <div class="invalid-feedback">
                        Kirjoita kortin voimassaoloaika
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cc-expiration">CVV-turvakoodi</label>
                        <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                        <div class="invalid-feedback">
                        Kirjoita kortin CVV-turvakoodi
                        </div>
                    </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-lg btn-block custom-buy" type="submit">MAKSA</button>
                </form>
                <p></p>
                </div>
            </div>
            <!--Row ends-->
        </div>

        <div class="col-xl-2">            
        </div>
    </div>
    <!--Row ends-->   

    <div class="custom-space">
    <p></p> 
    </div> 

</div>  

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>

    <script type="text/javascript" src="user_cart.js"></script>
    <script type="text/javascript" src="change_quantity_sum.js"></script>
<?php
include("../footer.php");
?>