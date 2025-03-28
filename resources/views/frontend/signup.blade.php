@extends('frontend.layout.app')
@section('content')
<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title mt-5">
        <h1>Sign Up For Manager</h1>
      </div>
      @if (session('success'))
            <div class="alert alert-success" id="successMessage">
                {{ session('success') }}
            </div>
        @endif
      <div class="container">
        <div class="card shadow-lg p-4">
            <form action="{{ route('manager-insert') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Name Field -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name *</label>
                    <input value="{{old('name')}}" type="text" placeholder="" class="form-control @error('name') border-danger @enderror" name="name">
                    @error('name')
                        <div class="text-danger text-xs">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
    
                <!-- Email Field -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input value="{{old('email')}}" type="email" class="form-control @error('email') border-danger @enderror" id="email" name="email">
                    @error('email')
                        <div class="text-danger text-xs">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
    
                <!-- Password Field -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password *</label>
                    <input type="password" class="form-control @error('password') border-danger @enderror" id="password" name="password">
                    @error('password')
                        <div class="text-danger text-xs">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Cinfirm Password *</label>
                    <input type="password" class="form-control @error('password_confirmation') border-danger @enderror" id="password_confirmation" name="password_confirmation">
                    @error('password_confirmation')
                        <div class="text-danger text-xs">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>
        </div>
    </div>

    </div>
  </section><!-- End Sevices Section -->
@endsection