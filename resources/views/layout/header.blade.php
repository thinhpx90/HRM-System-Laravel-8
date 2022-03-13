
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">

    <a class="navbar-brand" href="/">QUẢN LÝ NHÂN SỰ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" style="color: white" href="{{url('company')}}">Company </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" style="color: white" href="{{url('department')}}">Department</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" style="color: white" href="{{url('designation')}}">Designation</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" style="color: white" href="{{url('employee')}}">Employee</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="color: white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Search
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{url('date/filter/employee')}}">By Date</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{url('salary/filter/employee')}}">By Salary</a>
          </div>
      </li>
      </ul>

      <ul class="navbar-nav mr-2">
        <li class="nav-item">
          <a class="nav-link" style="color: white" href="#">Print</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" style="color: white" href="#">Login</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" style="color: white" href="#">Register</a>
        </li>
      </ul>

    </div>

  </div>
</nav>
