<section class="p-0 b-0">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-sm-4 img-side img-left mb-0">
          <div class="img-holder">
            <img src="frontend/images/bg/33.jpg" alt="" class="bg-img">
            <div class="centrize">
              <div class="v-center">
                <div class="title txt-xs-center">
                  <h4 class="upper">This is what we love to do.</h4>
                  <h3>Expertise<span class="red-dot"></span></h3>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end of side background image-->

        @php
            $expertise_data= App\Models\Expertise::where('status', true)->where('trash', false)->take(4)-> latest()->get();
            $i=1;
        @endphp
        <div class="col-md-6 col-md-offset-6 col-sm-8 col-sm-offset-4">
          <div class="services">
            <div class="row">
              @foreach ($expertise_data as $expertise)
                  @php
                      if ($i==1) {
                        $border_typpe='border-bottom border-right';
                      }elseif ($i==2) {
                        $border_typpe='border-bottom';
                      }elseif ($i==3) {
                        $border_typpe='border-bottom border-right';
                      }elseif ($i==4) {
                        $border_typpe='border-bottom ';
                      }
                  @endphp
                    <div class="col-sm-6 {{ $border_typpe }}">
                      <div class="service"><i class="icon-focus"></i><span class="back-icon"><i class="icon-focus"></i></span>
                        <h4>{{ $expertise->title }}</h4>
                        <hr>
                        <p class="alt-paragraph">Facilis doloribus illum quis, expedita mollitia voluptate non iure, perspiciatis repellat eveniet volup.</p>
                      </div>
                      <!-- end of service-->
                    </div>
                  @php
                      $i++;
                  @endphp
              @endforeach
              
             
            </div>
          </div>
          <!-- end of row-->
        </div>
      </div>
      <!-- end of row -->
    </div>
  </section>