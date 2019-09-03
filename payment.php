<style>
section#inner-headline {
    background: #37393c !important;
}
img{
    width:100%;
}
.instOrRemit{
  cursor:pointer;
}



.slider {
  width: 200px;
  margin: 100px auto;
}

input[type="range"] {
  -webkit-appearance: none;
  -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
  width: 100%;
  height: 25px;
  margin: 0;
  border: none;
  padding: 0px;
  border-radius: 14px !important;
  background: #dee3ea;
  box-shadow: inset 0 1px 0 0 #0d0e0f, inset 0 -1px 0 0 #3a3d42;
  -webkit-box-shadow: inset 0 1px 0 0 #0d0e0f, inset 0 -1px 0 0 #3a3d42;
  outline: none; /* no focus outline */
}

input[type="range"]::-moz-range-track {
  border: inherit;
  background: transparent;
}

input[type="range"]::-ms-track {
  border: inherit;
  color: transparent; /* don't drawn vertical reference line */
  background: transparent;
}

input[type="range"]::-ms-fill-lower,
input[type="range"]::-ms-fill-upper {
  background: transparent;
}

input[type="range"]::-ms-tooltip {
  display: none;
}

/* thumb */

input[type="range"]::-webkit-slider-thumb {
  -webkit-appearance: none;
  width: 40px;
  height: 18px;
  border: none;
  border-radius: 12px;
  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #529de1), color-stop(100%, #245e8f)); /* android <= 2.2 */
  background-image: -webkit-linear-gradient(top , #529de1 0, #245e8f 100%); /* older mobile safari and android > 2.2 */;
  background-image: linear-gradient(to bottom, #529de1 0, #245e8f 100%); /* W3C */
}
input[type="range"]::-moz-range-thumb {
  width: 40px;
  height: 18px;
  border: none;
  border-radius: 12px;
  background-image: linear-gradient(to bottom, #529de1 0, #245e8f 100%); /* W3C */
}

input[type="range"]::-ms-thumb {
  width: 40px;
  height: 18px;
  border-radius: 12px;
  border: 0;
  background-image: linear-gradient(to bottom, #529de1 0, #245e8f 100%); /* W3C */
}
tr.monthpcker > td {
    position: absolute;
    width: 90%;
}
.modal-title {
    font-size: 25px;
    padding: 5px;
    color:#fff;
}
.modal-header {
    background: #0480be;
}
.btn {
    background: #0480be;
    border-color: #0480be;
}
</style>
<?php 
$subtotal = $_GET['st'];
?>
<section id="content">

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Installment</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
      <select class='remOpts'>
        <option value="" Selected>-Select Payment-</option>
        <option value="Full_Payment">Full Payment</option>
        <option value="Installment_plan">Installment Plan</option>
      </select>
      <!-- Container for Full Paid -->
      <div class="container FullPaid">
          <div class="row">
            <div class="col-md-6">
              <table>
                <tr><td class="total_price" value="<?php echo $subtotal;?>"><h3>Total Ordered Price:&nbsp;₱<?php echo $subtotal;?> </h3></td></tr>

              </table>
            </div>
          </div>

        </div>
      <!-- Container end for Full Paid -->
      
      <!-- Container -->
        <div class="container installment">
          <div class="row">
            <div class="col-md-6">
              <table>
                <tr><td class="total_price" value="<?php echo $subtotal;?>"><h3>Total Ordered Price:&nbsp;₱<?php echo $subtotal;?> </h3></td></tr>
                <tr><td class="product_interest" value="10"><h4>Product Interest:&nbsp;10%</h4></td></tr>

              </table>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <table>
                <tr><td><h4 class="payvalue">Initial Payment: 10</h4></td></tr>
                <tr class="monthpcker"><td> <input class="slider initial_payment" type="range" min="1" max="<?php echo $subtotal;?>" value="1"></td></tr>
              </table>
            </div>
           </div>
          <div class="row">
            <div class="col-md-6">
              <table>
                <tr><td><h4 class="rangevalue">Months To Pay: 10</h4></td></tr>
                <tr class="monthpcker"><td> <input class="slider monthpcr" type="range" min="1" max="36" value="10"></td></tr>
              </table>
            </div>
           </div>
           <div class="row">
            <div class="col-md-6">
              <table>
                <tr><td><h4 class="totalpayment">Total Payment: ₱3400</h4></td></tr>
                <tr><td><h4 class="monthlypayment">Monthly Payment: ₱300</h4></td></tr>
              </table>
            </div>
          </div>

        </div>
      <!-- End Container -->
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="proceed" href="index.php?q=checkout&ct=IR"><button type="button" class="btn btn-primary">Proceed</button></a>
      </div>
    </div>
  </div>
</div>
<!-- Payment method -->
<div class="container">
  <div class="row">
    
     <div class="col-sm-3 info-blocks col-md-offset-2" >
        <div class="stretch">
        <a href="index.php?q=checkout">
        <img src="<?php echo web_root; ?>Include/Img/COD.png" alt="Watch Ur Toyo">
        </a>
        </div>
        <div class="info-blocks-in">
            <a href="index.php?q=checkout">
            <h3>Cash On Delivery</h3>
            </a>
        </div>
     </div>

     <!-- <div class="col-sm-3 info-blocks instOrRemit" data-toggle="modal" data-target="#exampleModal">
        <div class="stretch">
        <img src="<?php echo web_root; ?>Include/Img/installment.png" alt="Watch Ur Toyo">
        </div>
        <div class="info-blocks-in">
            <h3>Installment</h3>
        </div>
     </div> -->

     <div class="col-sm-3 info-blocks instOrRemit" data-toggle="modal" data-target="#exampleModal">
        <div class="stretch">
        <img src="<?php echo web_root; ?>Include/Img/remittance.png" alt="Watch Ur Toyo">
        </div>
        <div class="info-blocks-in">
            <h3>Remittance</h3>
        </div>
     </div>

  </div>
</div>

</section>
<script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.js"></script>
<script src="<?php echo web_root; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo web_root; ?>plugins/jQueryUI/jquery-ui.js"></script>
<script src="<?php echo web_root; ?>plugins/jQueryUI/jquery-ui.min.js"></script>

<script>
$(function() {

var Calc = function(options) {
  $.extend(this, options, {
    currency: ' ₽',
    months: 36
  });

  this.cache();
  this.bind();

  return this;
};

$.extend(Calc.prototype, {
  cache: function() {
    this.$slider = $('.monthpcr');
    this.$rangeValue = $('.rangevalue');
    this.$payvalue = $('.payvalue');
    this.$total_price = parseInt($('.total_price').attr('value'));
    this.$product_interest = parseInt($('.product_interest').attr('value'));
    this.$totalpayment = $('.totalpayment');
    this.$initial_payment =$('.initial_payment');
    this.$monthlypayment = $('.monthlypayment');
    this.$resultTP = 0;
    this.$monthlyPayment = 0;
  },
  bind: function() {
    $('.installment,.FullPaid').hide()
    this.defaultModal();
    this.getMonths();
    this.getInitPayment()
    this.$slider.on('input', $.proxy(this.getMonths, this));
    this.$initial_payment.on('input', $.proxy(this.getInitPayment, this));
    this.$resultTP= ((((this.$product_interest/100)*this.$total_price))+this.$total_price)-this.$initial_payment.val()
    this.$totalpayment.text('Total Price: ₱'+this.$resultTP)

  },
  defaultModal:function(){
    $('.remOpts').change(function(){
      var remittanceOptions = $('.remOpts').find(":selected").attr('value')
      console.log(remittanceOptions)
      switch(remittanceOptions){
        case '':
          $('.installment').hide()
          $('.FullPaid').hide()
          break;
        case 'Full_Payment':
        $('.installment').hide()
          $('.FullPaid').show()
          $('.proceed').attr('href','index.php?q=checkout&ct=RM')
          break;
        case 'Installment_plan':
          $('.FullPaid').hide()
          $('.installment').show()
          break;
      }
    })
  },
  getMonths: function(){
    this.$slider.attr('max', this.months);
    this.$rangeValue.text('Months To Pay: '+this.$slider.val());

    this.$resultTP = ((((this.$product_interest/100)*this.$total_price))+this.$total_price)-this.$initial_payment.val()
    this.$monthlyPayment = (this.$resultTP/this.$slider.val()).toFixed(2)
    this.$monthlypayment.text('Monthly Payment: ₱'+this.$monthlyPayment)

    $.ajax({
           type: "POST",
           url: "ajaxSession.php",
           data: {tp:this.$resultTP,mtp:this.$slider.val(),mp:this.$monthlyPayment,pi:this.$product_interest,inp:this.$initial_payment.val()},
           success: function(data){
            //  console.log('success')
           }
         });

  },
  getInitPayment:function(){
    // this.$initial_payment.attr('max', this.months);
    this.$payvalue.text('Initial Payment: '+this.$initial_payment.val());

    this.$resultTP = ((((this.$product_interest/100)*this.$total_price))+this.$total_price)-this.$initial_payment.val()
    this.$totalpayment.text('Total Price: ₱'+this.$resultTP)
    this.$monthlyPayment = (this.$resultTP/this.$slider.val()).toFixed(2)
    this.$monthlypayment.text('Monthly Payment: ₱'+this.$monthlyPayment)
    
    $.ajax({
           type: "POST",
           url: "ajaxSession.php",
           data: {tp:this.$resultTP,mtp:this.$slider.val(),mp:this.$monthlyPayment,pi:this.$product_interest,inp:this.$initial_payment.val()},
           success: function(data){
            //  console.log('success')
           }
         });
  }
  
});

window.Calc = Calc;
});

$(function() {
var app = new Calc({months: 12});
});
</script>
