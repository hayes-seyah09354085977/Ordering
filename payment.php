<style>
section#inner-headline {
    background: #37393c !important;
}
img{
    width:100%;
}
</style>
<section id="content">

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Installment / Remittance</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
        Modal for Installment or Remittance
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

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

     <div class="col-sm-3 info-blocks " data-toggle="modal" data-target="#exampleModal">
        <div class="stretch">
        <img src="<?php echo web_root; ?>Include/Img/installment.png" alt="Watch Ur Toyo">
        </div>
        <div class="info-blocks-in">
            <h3>Installment</h3>
        </div>
     </div>

     <div class="col-sm-3 info-blocks" data-toggle="modal" data-target="#exampleModal">
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

<script>
// $('#exampleModal').on('shown.bs.modal', function () {
//   $('#myInput').trigger('focus')
// })
</script>