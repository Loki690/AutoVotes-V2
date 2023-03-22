<?php
  include('includes/header.php');
  
  require_once('class.php');
  
  $voterDetails = $vote->getUserData();

  // $vote->logout();
  

?>

<?php
 include 'includes/usernav.php'
?>

<main>
  <div class="container-fluid bg-white">
    <div class="row">
      <div class="col-md-12">
        <div class="px-4 pt-5 my-5 text-center border-bottom">
          <h1 class="display-4 fw-bold title-app">Welcome <?= $voterDetails['first_name'] ?></h1>
          <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">CSSG ELECTION</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
              <a href="store-myproducts.php?id=<?= $voterDetails['studentID']; ?>"><button type="button"
                  class="btn btn-primary btn-lg px-4 me-sm-3 text-white" id="loginbutton">VOTE</button>
              </a>
             
            </div>

          </div>
          <!-- <div class="overflow-hidden" style="max-height: 30vh;">
            <div class="container px-5">
              <img src="uploads/<?= $voterDetails['course'] ?>" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="1000" height="500" loading="lazy">
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Modal -->
<div class="modal fade" id="store_logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Logout</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4>
          Are you sure you want to Logout?
        </h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="" method="POST">
          <button type="submit" class="btn btn-danger text-white" name="logout">Logout</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
 include('includes/footer.php');
?>