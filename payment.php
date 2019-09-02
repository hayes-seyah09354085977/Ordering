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


.slider{
  -webkit-appearance: none;
  width: 100%;
  height: 10px;
  background: #dbdbdb;
  position: relative;
  outline: none;
  margin-bottom: 20px;
}
.slider-point{
  height: 20px;
  width: 20px;
  border-radius: 50%;
  background: #A7CB00;
  position: absolute;
  top: -5px;
  -moz-transition: left 0.3s;
  -webkit-transition: left 0.3s;
  transition: left 0.3s;
}


.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  background: #A7CB00;
  cursor: pointer;
  -moz-transition: background .15s ease-in-out;
  -webkit-transition: background .15s ease-in-out;
  transition: background .15s ease-in-out;
}

.slider::-webkit-slider-thumb:hover {
  background: #7B9500;
}

.slider:active::-webkit-slider-thumb {
  background: #7B9500;
}

.slider::-moz-range-thumb {
  width:20px;
  height: 20px;
  border: 0;
  border-radius: 50%;
  background: #A7CB00;
  cursor: pointer;
  -moz-transition: background .15s ease-in-out;
  -webkit-transition: background .15s ease-in-out;
  transition: background .15s ease-in-out;
}
.slider::-moz-range-thumb:hover {
  background: #7B9500;
}

.slider:active::-moz-range-thumb {
  background: #7B9500;
}
tr.monthpcker > td {
    position: absolute;
    width: 90%;
}
</style>
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
      <!-- Container -->
        <div class="container">
          <div class="row">
            <div class="col-sm-3">
              <table>
                <tr><td class="product_price" value="3200">Product Price:&nbsp; ₱3200</td></tr>
                <tr><td class="quantity" value="2">Quantity:&nbsp;2</td></tr>
                <tr><td class="total_price" value="6400">Total Price:&nbsp;₱6400 </td></tr>
                <tr><td class="product_interest" value="10">Product Interest:&nbsp;10%</td></tr>
              </table>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <table>
                <tr><td class="rangevalue">Months To Pay: 10</td></tr>
                <tr class="monthpcker"><td> <input class="slider" type="range" min="1" max="36" value="10"></td></tr>
              </table>
            </div>
           </div>
           <div class="row">
            <div class="col-sm-3">
              <table>
                <tr><td class="totalpayment">Total Payment: ₱3400</td></tr>
                <tr><td class="monthlypayment">Monthly Payment: ₱300</td></tr>
              </table>
            </div>
          </div>

        </div>
      <!-- End Container -->
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Proceed</button>
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

     <div class="col-sm-3 info-blocks instOrRemit" data-toggle="modal" data-target="#exampleModal">
        <div class="stretch">
        <img src="<?php echo web_root; ?>Include/Img/installment.png" alt="Watch Ur Toyo">
        </div>
        <div class="info-blocks-in">
            <h3>Installment</h3>
        </div>
     </div>

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
    this.$slider = $('.slider');
    this.$rangeValue = $('.rangevalue');
    this.$total_price = parseInt($('.total_price').attr('value'));
    this.$product_interest = parseInt($('.product_interest').attr('value'));
    this.$totalpayment = $('.totalpayment');
    this.$monthlypayment = $('.monthlypayment');
  },
  bind: function() {
    this.getMonths();
    this.$slider.on('input', $.proxy(this.getMonths, this));
    var resultTP = (((this.$product_interest/100)*this.$total_price))+this.$total_price
    this.$totalpayment.text('Total Price: ₱'+resultTP)

  },
  getMonths: function(){
    var result;
    this.$slider.attr('max', this.months);
    this.$rangeValue.text('Months To Pay: '+this.$slider.val());

    var resultMonth = ((((this.$product_interest/100)*this.$total_price))+this.$total_price)
    this.$monthlypayment.text('Total Price: ₱'+(resultMonth/this.$slider.val()).toFixed(2))

  }
  
});



window.Calc = Calc;
});

$(function() {
var app = new Calc({months: 12});
});
</script>