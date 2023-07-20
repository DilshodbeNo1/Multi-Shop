@extends('layouts.web')

@section('content')

<div class="row mt-sm-4">
  <div class="col-12 col-md-12 col-lg-4">
    <div class="card author-box">
      <div class="card-body">
        <div class="author-box-center">
          <img style="margin-left:40px" alt="image"  src="/img/jimmy-pelissier-20210327-203318.jpg" width="350" class="rounded-circle author-box-picture">
          <div class="clearfix"></div>
          <div class="author-box-name">
            <h3 align=center><a href="">{{ auth()->guard('client')->user()->name }}</a></h3>
          </div>
        </div>
        <br><hr>
        <div class="text-center">
          <div class="author-box-description">
            <form action="{{ route('client.logout') }}" method="POST">
              @csrf
              <input type="submit" class="btn btn-danger" value="Logout">
            </form>          
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-6 col-lg-6">
    <div class="card">
      <div class="card-header">
        <h4>Simple Table</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-md">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orders as $or)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $or->total_id }}</td>
                  <td>{{ $or->created_at }}</td>
                  <td>
                    <div class="badge badge-success">@if($or->status==1){{ 'Jarayonda' }} @else {{ 'Tugallangan' }}  @endif</div>
                  </td>
                  <td><a href="#" class="btn btn-primary">Detail</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer text-right">
        {{ $orders->links() }}
      </div>
    </div>
  </div>
  {{-- <div class="col-12 col-md-12 col-lg-8">
    <div class="card">
      <div class="padding-20">
        <ul class="nav nav-tabs" id="myTab2" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab" aria-selected="true">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Setting</a>
          </li>
        </ul>
        <div style="margin-left:15px" class="tab-content tab-bordered" id="myTab3Content">
          <div class="tab-pane fade active show" id="about" role="tabpanel" aria-labelledby="home-tab2">
            <div class="row">
              <div class="col-md-3 col-6 b-r">
                <strong>Full Name</strong>
                <br>
                <p class="text-muted">Emily Smith</p>
              </div>
              <div class="col-md-3 col-6 b-r">
                <strong>Mobile</strong>
                <br>
                <p class="text-muted">(123) 456 7890</p>
              </div>
              <div class="col-md-3 col-6 b-r">
                <strong>Email</strong>
                <br>
                <p class="text-muted">johndeo@example.com</p>
              </div>
              <div class="col-md-3 col-6">
                <strong>Location</strong>
                <br>
                <p class="text-muted">India</p>
              </div>
            </div>
            <p class="m-t-30">Completed my graduation in Arts from the well known and
              renowned institution
              of India – SARDAR PATEL ARTS COLLEGE, BARODA in 2000-01, which was
              affiliated
              to M.S. University. I ranker in University exams from the same
              university
              from 1996-01.</p>
            <p>Worked as Professor and Head of the department at Sarda Collage, Rajkot,
              Gujarat
              from 2003-2015 </p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
              industry. Lorem
              Ipsum has been the industry's standard dummy text ever since the 1500s,
              when
              an unknown printer took a galley of type and scrambled it to make a
              type
              specimen book. It has survived not only five centuries, but also the
              leap
              into electronic typesetting, remaining essentially unchanged.</p>
            <div class="section-title">Education</div>
            <ul>
              <li>B.A.,Gujarat University, Ahmedabad,India.</li>
              <li>M.A.,Gujarat University, Ahmedabad, India.</li>
              <li>P.H.D., Shaurashtra University, Rajkot</li>
            </ul>
            <div class="section-title">Experience</div>
            <ul>
              <li>One year experience as Jr. Professor from April-2009 to march-2010
                at B.
                J. Arts College, Ahmedabad.</li>
              <li>Three year experience as Jr. Professor at V.S. Arts &amp; Commerse
                Collage
                from April - 2008 to April - 2011.</li>
              <li>Lorem Ipsum is simply dummy text of the printing and typesetting
                industry.
              </li>
              <li>Lorem Ipsum is simply dummy text of the printing and typesetting
                industry.
              </li>
              <li>Lorem Ipsum is simply dummy text of the printing and typesetting
                industry.
              </li>
              <li>Lorem Ipsum is simply dummy text of the printing and typesetting
                industry.
              </li>
            </ul>
          </div>
          <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
            <form method="post" class="needs-validation">
              <div class="card-header">
                <h4>Edit Profile</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6 col-12">
                    <label>First Name</label>
                    <input type="text" class="form-control" value="John">
                    <div class="invalid-feedback">
                      Please fill in the first name
                    </div>
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label>Last Name</label>
                    <input type="text" class="form-control" value="Deo">
                    <div class="invalid-feedback">
                      Please fill in the last name
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-7 col-12">
                    <label>Email</label>
                    <input type="email" class="form-control" value="test@example.com">
                    <div class="invalid-feedback">
                      Please fill in the email
                    </div>
                  </div>
                  <div class="form-group col-md-5 col-12">
                    <label>Phone</label>
                    <input type="tel" class="form-control" value="">
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-primary">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
</div>


@endsection