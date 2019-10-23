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
  /* select */
  select {
  background-color: white;
  border: thin solid blue;
  border-radius: 4px;
  display: inline-block;
  font: inherit;
  line-height: 1.5em;
  padding: 0.5em 3.5em 0.5em 1em;
  margin: 0;      
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-appearance: none;
  -moz-appearance: none;
  }
  /* select arrows */
  select.classic {
  background-image:
    linear-gradient(45deg, transparent 50%, blue 50%),
    linear-gradient(135deg, blue 50%, transparent 50%),
    linear-gradient(to right, skyblue, skyblue);
  background-position:
    calc(100% - 20px) calc(1em + 2px),
    calc(100% - 15px) calc(1em + 2px),
    100% 0;
  background-size:
    5px 5px,
    5px 5px,
    2.5em 2.5em;
  background-repeat: no-repeat;
  }

  select.classic:focus {
  background-image:
    linear-gradient(45deg, white 50%, transparent 50%),
    linear-gradient(135deg, transparent 50%, white 50%),
    linear-gradient(to right, gray, gray);
  background-position:
    calc(100% - 15px) 1em,
    calc(100% - 20px) 1em,
    100% 0;
  background-size:
    5px 5px,
    5px 5px,
    2.5em 2.5em;
  background-repeat: no-repeat;
  border-color: grey;
  outline: 0;
  }

.hdn{
  display:none;
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <select class='remOpts classic'>
        <option value="" Selected>-Select Product-</option>
        <!-- <?php if($_SESSION['Approved']==1){?>
        <option value="Installment_plan">Installment Plan</option>
        <?php }?> -->
      </select>
      <select class='planname classic'>
        <option value="" Selected>-Select Plan-</option>
      </select>
      
      <!-- Container -->
        <div class="container installment">
          <div class="row">
            <div class="col-md-6">
              <table>
                <tr><td class="total_price" value="1000"><h3>Product Price:&nbsp;₱<span class='pr_price'></span> </h3></td></tr>
                <tr><td class="product_interest" value="10"><h4>Product Interest:&nbsp;<span class='percent'>10</span></h4></td></tr>
                <tr><td><h4 class="rangevalue">Months To Pay: 10</h4><span class="slider monthpcr" value="3"></td></tr>
                
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
        <a class="proceed" href="#"><button type="button" class="btn btn-primary">Proceed</button></a>
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
        <img src="<?php echo web_root; ?>include/Img/COD.png" alt="Watch Ur Toyo">
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
        <img src="<?php echo web_root; ?>Include/Img/remittance.png" alt="Watch Ur Toyo">
        </div>
        <div class="info-blocks-in">
            <h3>Remittance</h3>
        </div>
     </div> -->
    <?php if($_SESSION['Approved']==1){?>
      <div class="col-sm-3 info-blocks instOrRemit hdn" data-toggle="modal" data-target="#exampleModal">
        <div class="stretch">
        <img src="<?php echo web_root; ?>include/Img/remittance.png" alt="Watch Ur Toyo">
        </div>
        <div class="info-blocks-in">
            <h3>Installment</h3>
        </div>
     </div>
    <?php }else{?>
      <div class="col-sm-3 info-blocks instOrRemit hdn">
        <div class="stretch">
        <img src="<?php echo web_root; ?>include/Img/remittance-disabled.png" alt="Watch Ur Toyo">
        </div>
        <div class="info-blocks-in">
            <h3>Installment</h3>
        </div>
     </div>
    <?php }?>
  </div>
</div>

</section>
<script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.js"></script>
<script src="<?php echo web_root; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo web_root; ?>plugins/jQueryUI/jquery-ui.js"></script>
<script src="<?php echo web_root; ?>plugins/jQueryUI/jquery-ui.min.js"></script>

<script>
$(function() {
var datas =[],
subtotal = '<?php echo $subtotal; ?>',
stmt='',
ProductList=[],
planList=[];
var Calc = function(options) {
  $.extend(this, options, {
    currency: ' ₽',
    months: 36
  });

  $('.installment').hide()
  $('.planname').hide()
  this.defaultModal();
  return this;
};

var zz = $.extend(Calc.prototype, {
  cache: function() {
    this.$slider = $('.monthpcr');
    this.$rangeValue = $('.rangevalue');
    this.$payvalue = $('.payvalue');
    this.$total_price = parseInt($('.total_price').attr('value'));
    this.$product_interest = parseInt($('.product_interest').attr('value'));
    this.$totalpayment = $('.totalpayment');
    this.$monthlypayment = $('.monthlypayment');
    this.$resultTP = 0;
    this.$monthlyPayment = 0;
    this.$subtotal = subtotal - parseInt($('.total_price').attr('value'))
  },
  bind: function() {
    // this.defaultModal();
    this.getMonths();
    this.getInitPayment()
    this.$resultTP= (((this.$product_interest/100)*this.$total_price))+this.$total_price
    this.$totalpayment.text('Total Price: ₱'+this.$resultTP)

    
  },
  defaultModal:function(){
        $.ajax({
           type: "POST",
           dataType:'json',
           url: "ajaxSession.php",
           data: {e:'getCart'},
           success: function(response){
            //  check installemnt
              var ProductID =response,
              product=''
              datas = response
              for(var aa = 0; aa <datas.length; aa++){
                stmt += 'pid='+datas[aa]['productID']+' OR '
              }
              stmt = stmt.slice(0,-4)
              $.ajax({
                    type: "POST",
                    dataType:'json',
                    url: "ajaxSession.php",
                    data: {e:'check_for_installment',stmt:stmt},
                    success: function(res){
                      if(res.length !=0){
                        $('.instOrRemit').removeClass('hdn')
                      planList=res
                          for(var b =0; b<ProductID.length;b++){
                            for (var bb = 0; bb<res.length; bb++){
                              if(res[bb]['pid'] == ProductID[b]['productID']){
                                datas[b]['Percentage']=res[bb]['percentage']
                                var plist=ProductID[b]['productID']
                              if(ProductList.indexOf(ProductID[b]['productID'])<0){
                                  product = ProductID[b]['product'].split('|')
                                  var pids = res[bb]['pid']
                                  $('.remOpts').append(`<option id="`+pids+`" value="`+b+`">`+product[0]+`</option>`)
                                ProductList.push(plist)
                              }
                            }
                          }
                        }
                      }
                    }
                  });
           }
      });

      $('.remOpts').change(function(){
      var remittanceOptions = $(this).val()
      if(remittanceOptions == ''){
        $('.FullPaid').hide()
        $('.proceed').attr('href','#')
        $('.installment').hide()
        $('.planname').hide()
      }else{
        $('.planname').children().remove()
        $('.planname').append(`<option value="" Selected>-Select Plan-</option>`)
        $('.installment').hide()
        var ProdSelected = $('.remOpts option:selected').attr('id')
        $('.planname').show()
        for(var a = 0; a < planList.length; a++){
          if(planList[a]['pid']==ProdSelected){
            var pname = planList[a]['planname']
            $('.planname').append(`<option value="`+a+`">`+pname+`</option>`)
          }
        }
      }
        
    })

    $('.planname').change(function(){
      var planValue = $(this).val(),
      optsVal = $('.remOpts option:selected').val()

      if(planValue == ''){
        $('.installment').hide()
      }else{
        console.log(planList[planValue])
        console.log(datas)
        var percent = planList[planValue]['percentage'].replace('%','');
        console.log(planList[planValue]['months'])

        $('.installment').show()
        $('.percent').text(planList[planValue]['percentage'])
        $('.product_interest').attr('value',percent)
        $('.pr_price').text(datas[optsVal]['subtotal']+'.00')
        $('.total_price').attr('value',datas[optsVal]['subtotal'])
        $('.rangevalue').text('Months To Pay: '+planList[planValue]['months'])
        $('.monthpcr').attr('value',planList[planValue]['months']) //dag dag ka
        //  $('.initial_payment').attr('max',datas[remittanceOptions]['subtotal'])
        $('.proceed').attr('href','index.php?q=checkout&ct=IR')
        zz.cache();
        zz.bind()
      }
     
    })
   
   


  },
  getMonths: function(){
    this.$resultTP = (((this.$product_interest/100)*this.$total_price))+this.$total_price
    this.$monthlyPayment = (this.$resultTP/this.$slider.attr('value')).toFixed(2)
    this.$monthlypayment.text('Monthly Payment: ₱'+this.$monthlyPayment)
    $.ajax({
           type: "POST",
           url: "ajaxSession.php",
           data: {e:'payment',tp:this.$resultTP,mtp:this.$slider.attr('value'),inp:this.$monthlyPayment,mp:this.$monthlyPayment,pi:this.$product_interest},
           success: function(data){
            //  console.log('success')
           }
         });
  },
  getInitPayment:function(){

    this.$resultTP = (((this.$product_interest/100)*this.$total_price))+this.$total_price
    this.$totalpayment.text('Balance: ₱'+(this.$resultTP+this.$subtotal))
    this.$monthlyPayment = (this.$resultTP/this.$slider.attr('value')).toFixed(2)
    // this.$monthlypayment.text('Monthly Payment: ₱'+this.$monthlyPayment)
    
    var total_payment = (this.$total_price*0.10)+this.$total_price

    var days = this.$slider.attr('value') * 30 //count days for due date
    var due_dates = new Date(new Date().getTime()+(120*24*days*31*1000)).toISOString().substr(0, 10) //due date
    console.log(due_dates)
    console.log(days)

    $.ajax({
           type: "POST",
           url: "ajaxSession.php",
           data: {e:'payment',tp:this.$resultTP,mtp:this.$slider.attr('value'),inp:this.$monthlyPayment,mp:this.$monthlyPayment,pi:this.$product_interest,total_payment:total_payment,due_date:due_dates},
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
