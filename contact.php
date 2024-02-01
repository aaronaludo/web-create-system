<?php include('layout/_header.php');?>

    <div class="container">
        <div class="p-5 text-center rounded-3 mt-5">
            <h1 class="color-webcreate fw-bold hero-title position-relative display-3">Contact Us</h1>
            <hr class="featurette-divider" />
        </div>
    </div>

    <div class="bg-webcreate-2 marketing section-padding-top">
      <div class="container">
        <div class="row featurette">
          <div class="col-lg-6">
            <p class="lead color-webcreate mt-5 fw-bold">
              Contact Us
            </p>
            <p class="lead color-webcreate">
                Feel free to contact us using the provided form.
            </p>
            <p class="lead color-webcreate mt-3">
              <i class="fa-solid fa-envelope" style="font-size: 18px"></i>
              Email: randal.fuentes.d@bulsu.edu.ph
            </p>
          </div>
          <div class="col-lg-6 justify-content-center d-flex">
            <div class="modal-content rounded-4 shadow">
              <div class="modal-header p-5 pb-4 border-bottom-0">
                <h1 class="fw-bold mb-0 fs-2 color-webcreate">Contact Us</h1>
              </div>
              <div class="modal-body p-5 pt-0">
                <form class="">
                  <div class="row">
                    <div class="col-lg-6 col-12">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-3" id="floatingone" placeholder="Your Name">
                        <label for="floatingone">Your Name</label>
                      </div>
                    </div>
                    <div class="col-lg-6 col-12">
                      <div class="form-floating mb-3">
                        <input type="email" class="form-control rounded-3" id="floatingtwo" placeholder="Your Email Address">
                        <label for="floatingtwo">Your Email Address</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-3" id="floatingthree" placeholder="Phone Number">
                        <label for="floatingthree">Phone Number</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="mb-3">
                        <textarea class="form-control" rows="4" placeholder="Message"></textarea>
                      </div>
                    </div>
                  </div>
                  <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Sign up</button>
                </form>
              </div>
            </div>
          </div>
          <hr class="featurette-divider" />
        </div>
      </div>
    </div>

<?php include('layout/_footer.php');?>
