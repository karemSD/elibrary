<x-layout>
<section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100 ">
        <div class="col">
          <div class="card">
            <div class="card-body p-4 bg-white">

              <div class="row">

                <div class="col-lg-7">
                  <h5 class="mb-3"><a href="/" class="text-body"><i
                        class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                  <hr>

                  <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                      <p class="mb-1">Shopping cart</p>
                      <p class="mb-0">You have {{count($carts)}} items in your cart</p>
                    </div>

                  </div>
                  @php
                  $total=0

                  @endphp
                  @unless(count($carts) == 0)

                  @foreach($carts as $cart)
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="{{$cart->id}}" name=""/>
                  </div>
                  <label class="form-check-label" for="{{$cart->id}}">
                  <div class="card mb-3  ">

                    <div class="card-body bg-white">
                      <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                          <div>
                            <img
                              src="{{asset('images/'.$cart->book->pathImage)}}"
                              class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                          </div>
                          <div class="ms-3">
                            <h5>{{$cart->book->title}}</h5>
                            <p class="small mb-0">Author : {{$cart->book->author->name}}, Publisher : {{$cart->book->publisher->name}}, Category: {{$cart->book->category->name}} </p>
                          </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">

                          <div style="width: 90px;">
                            <h5 class="mb-1 mt-4 px-4">${{$cart->book->price}}   </h5>
                          </div>
                          <form method="POST" action="/carts/{{$cart->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500"><i class="fa-solid fa-trash"></i></button>
                          </form>

                        </div>
                      </div>
                    </div>
                  </div>
                </label>
                  @php
                  $total+=$cart->book->price

                  @endphp


                  @endforeach

                  @else
                  <p>Nothin  found</p>
                  @endunless


                  <div class="card mb-3 mb-lg-0 " >
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                          <div>
                            <img
                              src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img4.webp"
                              class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                          </div>
                          <div class="ms-3">
                            <h5>MacBook Pro</h5>
                            <p class="small mb-0">1TB, Graphite</p>
                          </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                          <div style="width: 50px;">
                            <h5 class="fw-normal mb-0">1</h5>
                          </div>
                          <div style="width: 80px;">
                            <h5 class="mb-0">$1799</h5>
                          </div>
                          <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="col-lg-5">

                  <div class="card text-white rounded-3">
                    <div class="card-body  bg-secondary">
                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0 text-white" >Card details</h5>

                      </div>

                      <p class="small mb-2">Card type</p>
                      <a href="#!" type="submit" class="text-white"><i
                          class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                      <a href="#!" type="submit" class="text-white"><i
                          class="fab fa-cc-visa fa-2x me-2 "></i></a>
                      <a href="#!" type="submit" class="text-white"><i
                          class="fab fa-cc-amex fa-2x me-2"></i></a>
                      <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a>



                      {{--  --}}


                    <form class="mt-4" method="POST" action="/createcopy">
                      @csrf
                        <div class="form-outline form-white mb-4">
                          <input required type="text" id="typeName" class="form-control form-control-lg" siez="17"
                            placeholder="Cardholder's Name" />
                          <label class="form-label" for="typeName">Cardholder's Name</label>
                        </div>

                        <div class="form-outline form-white mb-4">
                          <input required type="text" id="typeText" class="form-control form-control-lg" siez="17"
                            placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                          <label class="form-label" for="typeText">Card Number</label>
                        </div>

                        <div class="row mb-4">
                          <div class="col-md-6">
                            <div class="form-outline form-white">
                              <input type="text" id="typeExp" class="form-control form-control-lg"
                                placeholder="MM/YYYY" size="7" id="exp" minlength="7" maxlength="7"required />
                              <label class="form-label" for="typeExp">Expiration</label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-outline form-white">
                              <input type="password" id="typeText" class="form-control form-control-lg"
                                placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3"  required/>
                              <label class="form-label" for="typeText">Cvv</label>
                            </div>
                          </div>

                          <div class="form-outline form-white mb-4">
                            <input required type="text" id="typeText" class="form-control form-control-lg"
                              placeholder="syria damascus"  name="address"/>
                            <label class="form-label" for="typeText">Delivery Address</label>
                          </div>
                        </div>


                      <hr class="my-4">

                      <button  class="btn btn-info btn-block btn-lg">
                        <div class="d-flex justify-content-between">
                          <span>${{$total}}</span>
                          <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                        </div>
                      </button>

                    </div>
                  </div>
                </form>

                </div>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout>
