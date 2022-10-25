<div class="bg-body-light">
    <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
        <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3"> 
          <form action="{{route('goback')}}" method="post">
            @csrf
              <button class="btn btn-primary">👈 Go Back</button>
          </form>  
        </h1>
        <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">Elements</li>
            <li class="breadcrumb-item active" aria-current="page">Ribbons</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>