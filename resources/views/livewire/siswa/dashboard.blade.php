<style>
    .carousel-custom img {
        height: 320px; 
        object-fit: cover;
        border-radius: 15px; 
    }
</style> 

<div>
    <div class="row">
        <div class="col-12">  
            <div class="card"> 
                <div class="card-body mb-0">  
                  

                    <h1>Assalaamualaikum, {{ Auth()->user()->name }}!</h1>


                </div> 
                <div class="card-body"> 
                   
                    <div class="mt-3">
                        <livewire:clock timezone="Asia/Jakarta" format="H:i:s" />
                    </div>
                   <div class="d-flex justify-content-center mt-4">
    <div style="width: 80%;">

        <div id="carouselExampleIndicators"
     class="carousel slide"
     data-bs-ride="carousel"
     data-bs-interval="3000"
     data-bs-pause="false">

            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
            </div>
            
            <div class="carousel-inner carousel-custom rounded-3 shadow-sm">
                 @foreach ($motivasi as $item)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $item->image_url) }}" class="d-block w-100" alt="Slide 1">
                </div>
            
                  @endforeach
                  </div> 

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>

        </div>

    </div>
</div>



                </div> 
            </div> 
        </div>
    </div>
</div>
