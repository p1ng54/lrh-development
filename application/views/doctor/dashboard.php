
<?php $this->load->view('include/header-doctor'); ?>
<div class="content mt-3 mb-4" ng-controller="drContoller">
  <div class="row">
    <div class="col-lg-4 col-md-6">
      <div class="card">
        <div class="card-body">
          <div class="stat-widget-one">
            <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
            <div class="stat-content dib">
              <div class="stat-text">Today Appointments</div>
              <div class="stat-digit">12</div>
            </div>
          </div>
        </div>
      </div>
    </div> 
    <div class="col-lg-4 col-md-6">
      <div class="card">
        <div class="card-body">
          <div class="stat-widget-one">
            <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
            <div class="stat-content dib">
              <div class="stat-text">Total Register Patient</div>
              <div class="stat-digit">22</div>
            </div>
          </div>
        </div>
      </div>
    </div> 
    <div class="col-lg-4 col-md-6">
      <div class="card">
        <div class="card-body">
          <div class="stat-widget-one">
            <div class="stat-icon dib"><i class="ti-link text-danger border-danger"></i></div>
            <div class="stat-content dib">
              <div class="stat-text">Happy Customers</div>
              <div class="stat-digit">100</div>
            </div>
          </div>
        </div>
      </div>
    </div> 
  </div>
  <div class="row">
    <div class="col-sm-12">

      <div class="card">
        <div class="card-header">
          <h4>Today Appointments</h4>
        </div>
        <div class="card-body">  
          <div class="d-flex flex-row vertical-tabset">
            <ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left" role="navigation">
              <li class="nav-item">
                <a href="#lorem" class="nav-link active" data-toggle="tab" role="tab" aria-controls="lorem">Lorem</a>
              </li>
              <li class="nav-item">
                <a href="#ipsum" class="nav-link" data-toggle="tab" role="tab" aria-controls="ipsum">Ipsum</a>
              </li>

            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="lorem" role="tabpanel">
                <div class="d-flex justify-content-between pb-2 border-bottom">
                  <h1>Lorem</h1>
                  <button type="button" class="btn btn-sm btn-success" ng-click="takeHistory()">Take History</button>
                </div>               
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde eos impedit, sed, modi pariatur in maxime explicabo rem voluptatibus quo ullam nam veritatis aut natus accusamus ut beatae praesentium dignissimos.</p>               
              </div>
              <div class="tab-pane fade" id="ipsum" role="tabpanel">
               <div class="d-flex justify-content-between pb-2 border-bottom">
                  <h1>Lorem 2</h1>
                  <button type="button" class="btn btn-sm btn-success">Take History</button>
                </div> 

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias dolores et adipisci ab tempora maxime cum in, repellat earum optio alias illo culpa eum, amet sed blanditiis sit. Voluptate, ab!</p>

              </div>
              <div class="tab-pane fade" id="dolor" role="tabpanel">
                <h1>Dolor</h1>

                <p>Ut eo.</p>
              </div>
              <div class="tab-pane fade" id="sit-amet" role="tabpanel">
                <h1>Sit Amet</h1>

                <p>Afdfd</p>
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Right Panel -->
<?php $this->load->view('include/footer'); ?>