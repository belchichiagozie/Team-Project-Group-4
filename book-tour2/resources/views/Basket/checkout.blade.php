@extends('layouts.loginnav')

@section('content')
 



        <form method="POST" action="/mainlogin" class="bg-slate-800 rounded-2xl w-[300px] sm:w-[300px] md:w-[400px] lg:w-[500px] border border-solid border-2 flex max-w-2xl flex-col gap-4 lg:gap-8 text-black">
        @csrf
            <div class="p-8 sm:p-10 md:p-12 lg:p-16 text-3xl text-white flex flex-col justify-center items-center">
                <img class="w-40 h-40" src="/images/logotr.png" alt="Book-tour logo"/>
                <span class="flex flex-col justify-center items-center">
                    <h1>Shipping Address:</h1>
                    <span class="text-xs"></span>
                </span>
            </div>
            <div class="p-4 flex flex-col justify-center">
                <div class="mb-2 block text-white">
                    <label for="firstName" class="form-label">First Name</label>
                </div>
                <input name="name" id="name1" type="text" class="form-input" placeholder="First Name" required/>
            </div>

            <div class="p-4 flex flex-col justify-center">
                <div class="mb-2 block text-white">
                    <label for="lastName" class="form-label">Last Name</label>
                </div>
                <input name="name" id="name1" type="text" class="form-input" placeholder="Last Name" required/>
            </div>


            <div class="p-4 flex flex-col justify-center">
                    
                <div class="mb-2 block text-white">
                    <label for="Country" class="form-label">Country</label>
                
                </div>

                  <div class="mb-3">
                        <select name="country" id="country" class="form-control form-input w-full">
                            <option value="">Select a Country</option>
                            
                            <option value="1">United Kingdom</option>
                            
                            <option value="2">France</option>
                        
                        </select>
                    </div>                              
            </div>

            <div class="p-4 flex flex-col justify-center">
                <div class="mb-2 block text-white">
                    <label for="Address" class="form-label">Your Address</label>
                </div>
                
                <input name="name" id="name1" type="text" class="form-input" placeholder="Address" required/>
            
            </div>

        
        </form>
        <div class="flex flex-col gap-4">
            <div class="right-bar bg-cyan-700 border-2 rounded-2xl" style="width: 400px; height: 220px; @apply md:w-[500px]; @apply lg:w-[600px]; margin-left: 20px;">
            
            <h1 class="text-white text-2xl mb-4 text-center">Order Summary</h1>
            <div class="flex justify-between mb-2">
                <span class="text-white">Subtotal</span>
                <span>£40</span>
            </div>
            
            <hr class="border-white">
            
            <div class="flex justify-between mb-2">
                <span class="text-white">Discount (50%)</span>
                <span>£20</span>
            
            </div>
           
            <hr class="border-white">
            
            <div class="flex justify-between mb-2">
                <span class="text-white">Shipping</span>
                <span>£5</span>
            </div>
            
            <hr class="border-white">
            
            <div class="flex justify-between">
                <span class="text-white">Total</span>
                <span>£25</span>
            </div>
            
            </div>
   
      

        <div class="right-bar bg-cyan-700 border-2 rounded-2xl" style="width: 400px; height: 220px; @apply md:w-[500px]; @apply lg:w-[600px]; margin-left: 20px;">
            <h1 class="text-white text-xl mb-4 text-center">Payment Details</h1>
            <div class="flex flex-col gap-4">
                <div class="flex flex-col items-center">
                    <label for="cardNumber" class="text-white">Card Number</label>
                    <input type="text" id="cardNumber" name="cardNumber" class="form-input text-black" placeholder="Enter your card number" style="width: 80%;" required>
             </div>
             <div class="flex flex-col items-center">
                <label for="expiryDate" class="text-white">Expiry Date</label>
                <input type="text" id="expiryDate" name="expiryDate" class="form-input text-black" placeholder="MM/YY" style="width: 80%;"required>
            </div>
            <div class="flex flex-col items-center">
                <label for="cvv" class="text-white">CVV</label>
                <input type="text" id="cvv" name="cvv" class="form-input text-black text-center" placeholder="Enter CVV" style="width: 30%;" required>
            </div>
            <div class="flex items-center justify-center">
                <button type="submit" class="bg-[#b2cdd8] rounded-lg text-black border border-solid p-2">Pay Now</button>
            </div>
        </div>
        </div>

        


       
                
        </div>

    </div>

    @if($errors->any())
    <div class="text-black alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection